<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $methods = [
            ['name'=>'Bank Transfer BCA','code'=>'bca_transfer','description'=>'Transfer via BCA VA'],
            ['name'=>'Midtrans','code'=>'midtrans','description'=>'Payment gateway Midtrans'],
            ['name'=>'COD','code'=>'cod','description'=>'Cash on Delivery'],
        ];
        foreach ($methods as $m) PaymentMethod::create($m);
    }
}
