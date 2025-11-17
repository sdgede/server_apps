<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            ['name' => 'Bank Transfer BCA', 'code' => 'bca_transfer', 'description' => 'Transfer via BCA VA'],
            ['name' => 'Midtrans', 'code' => 'midtrans', 'description' => 'Payment gateway Midtrans'],
            ['name' => 'COD', 'code' => 'cod', 'description' => 'Cash on Delivery'],
        ];

        foreach ($methods as $m) {
            PaymentMethod::create($m);
        }
    }
}
