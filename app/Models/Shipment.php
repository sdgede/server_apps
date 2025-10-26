<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = ['order_id','tracking_number','courier','shipped_date','delivered_date','status','address_id'];

    protected $dates = ['shipped_date','delivered_date'];

    public function order() { return $this->belongsTo(Order::class); }
    public function address() { return $this->belongsTo(Address::class); }
}
