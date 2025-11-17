<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
public function index()
{
$products = Product::latest()->paginate(10);

return view('content.products.index', compact('products'));
}

public function create()
{
return view('products.create');
}

public function store(Request $request)
{
$request->validate([
'name' => 'required',
'price' => 'required|numeric',
'stock' => 'required|numeric',
]);

Product::create($request->all());

return redirect()->route('products.index')
->with('success', 'Product created.');
}

public function edit(Product $product)
{
return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
$request->validate([
'name' => 'required',
'price' => 'required|numeric',
'stock' => 'required|numeric',
]);

$product->update($request->all());

return redirect()->route('products.index')
->with('success', 'Product updated.');
}

public function destroy(Product $product)
{
$product->delete();

return back()->with('success', 'Product deleted.');
}
}
