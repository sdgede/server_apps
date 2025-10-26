<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Support\Str;
use DB;

class ShipmentController extends Controller
{
    // Admin buat shipment & generate tracking
    public function createShipment(Request $request, $orderId)
    {
        $request->validate([
            'courier' => 'required|string',
            'address_id' => 'nullable|exists:addresses,id',
        ]);

        DB::beginTransaction();
        try {
            $order = Order::lockForUpdate()->findOrFail($orderId);

            if (!in_array($order->status, ['paid','processing'])) {
                return response()->json(['message'=>'Order must be paid/processing to ship'], 400);
            }

            $shipment = Shipment::create([
                'order_id' => $order->id,
                'tracking_number' => $this->generateTrackingNumber(),
                'courier' => $request->courier,
                'address_id' => $request->address_id ?: $order->address_id,
                'status' => 'shipped',
                'shipped_date' => now(),
            ]);

            // update order status
            $order->status = 'shipped';
            $order->save();

            DB::commit();
            return response()->json(['success'=>true,'shipment'=>$shipment], 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>$e->getMessage()],500);
        }
    }

    protected function generateTrackingNumber()
    {
        return 'TRK-'.date('YmdHis').'-'.Str::upper(Str::random(5));
    }
}
