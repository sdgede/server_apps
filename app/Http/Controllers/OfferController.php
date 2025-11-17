<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create()
    {
        return view('content.offer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'discount'    => 'required|numeric',
        ]);

        // Simpan ke database jika kamu punya model Offer
        // Offer::create($request->all());

        return redirect()->back()->with('success', 'Offer created.');
    }
}
