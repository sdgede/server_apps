<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $methods = PaymentMethod::paginate(10);
        return view('content.payment.index', compact('methods'));
    }

    public function create()
    {
        return view('content.payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'code'        => 'required|string',
            'description' => 'nullable|string',
            'status'      => 'required|string',
        ]);

        PaymentMethod::create([
            'name'        => $request->name,
            'code'        => $request->code,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        return redirect()->route('payment.index')
            ->with('success', 'Payment method added.');
    }
}
