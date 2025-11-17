<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
public function index()
{
return view('content.dashboard', [
'totalProducts' => 120,
'totalOrders' => 540,
'totalUsers' => 75,
'totalIncome' => 12000000,
]);
}
}
