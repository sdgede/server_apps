<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use Carbon\Carbon;
use DB;

class PaymentController extends Controller
{
    // Simpel: user/3rdparty konfirmasi pembayaran
    public function confirm(Request $request, $transactionId)
    {
        $request->validate([
            'status' => 'required|in:success,failed',
            'paid_at' => 'nullable|date'
        ]);

        DB::beginTransaction();
        try {
            $transaction = Transaction::lockForUpdate()->findOrFail($transactionId);

            if ($transaction->status === 'success') {
                return response()->json(['message'=>'Already success'], 200);
            }

            $transaction->status = $request->status;
            $transaction->paid_at = $request->paid_at ? Carbon::parse($request->paid_at) : Carbon::now();
            $transaction->save();

            // Update order status if success
            if ($transaction->status === 'success') {
                $order = $transaction->order;
                $order->status = 'paid';
                $order->save();
            }

            DB::commit();
            return response()->json(['success'=>true, 'transaction'=>$transaction], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>$e->getMessage()],500);
        }
    }
}
