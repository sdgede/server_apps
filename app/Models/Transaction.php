<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['order_id','payment_method_id','transaction_code','amount','status','paid_at'];

    protected $dates = ['paid_at'];

    public function order() { return $this->belongsTo(Order::class); }
    public function paymentMethod() { return $this->belongsTo(PaymentMethod::class); }
}
