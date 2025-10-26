<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use Illuminate\Support\Str;
use DB;

class CheckoutController extends Controller
{
    // Checkout: create order, order_items, and transaction (pending)
    public function checkout(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'address_id' => 'required|exists:addresses,id',
        ]);

        // Wrap transaction
        DB::beginTransaction();
        try {
            // calculate totals
            $total = 0;
            $itemsData = [];
            foreach ($request->items as $it) {
                $product = Product::findOrFail($it['product_id']);
                $price = $product->price;
                $qty = (int)$it['quantity'];
                $subtotal = bcmul((string)$price, (string)$qty, 2);
                $total = bcadd((string)$total, (string)$subtotal, 2);

                $itemsData[] = [
                    'product' => $product,
                    'quantity' => $qty,
                    'price' => $price,
                    'subtotal' => $subtotal
                ];
            }

            // create order
            $order = Order::create([
                'user_id' => $request->user_id,
                'order_code' => $this->generateOrderCode(),
                'total_amount' => $total,
                'status' => 'pending',
                'address_id' => $request->address_id,
            ]);

            // create order items & reduce stock (optional)
            foreach ($itemsData as $it) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $it['product']->id,
                    'quantity' => $it['quantity'],
                    'price' => $it['price'],
                    'subtotal' => $it['subtotal'],
                ]);
                // decrease stock
                $it['product']->decrement('stock', $it['quantity']);
            }

            // create transaction (pending)
            $transaction = Transaction::create([
                'order_id' => $order->id,
                'payment_method_id' => $request->payment_method_id,
                'transaction_code' => $this->generateTransactionCode(),
                'amount' => $total,
                'status' => 'pending',
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'order' => $order->load('items'),
                'transaction' => $transaction,
            ], 201);

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);
        }
    }

    protected function generateOrderCode()
    {
        return 'ORD-'.date('Ymd').'-'.Str::upper(Str::random(6));
    }

    protected function generateTransactionCode()
    {
        return 'TRX-'.time().'-'.Str::upper(Str::random(4));
    }
}
