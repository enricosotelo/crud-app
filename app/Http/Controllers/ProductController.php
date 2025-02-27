<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $newProduct = Product::create($data);

        session()->flash('success', 'Product created successfully!');
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $data =  $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        session()->flash('update', 'Product updated successfully!');
        return redirect()->route('product.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('destroy', 'Product deleted successfully!');
        return redirect()->route('product.index');
    }

    public function view(Product $product)
    {
        return view('products.view', ['product' => $product]);
    }
}
