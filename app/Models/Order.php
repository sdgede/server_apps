<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','order_code','total_amount','status','note','address_id'];

    public function user() { return $this->belongsTo(User::class); }
    public function items() { return $this->hasMany(OrderItem::class); }
    public function transaction() { return $this->hasOne(Transaction::class); }
    public function shipment() { return $this->hasOne(Shipment::class); }
    public function address() { return $this->belongsTo(Address::class); }
}
