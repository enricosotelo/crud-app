<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(){
    return view('products.index');
  }

  public function create(){
    return view('products.create');
  }

  public function store(Request $request){
    $data =  $request->validate([
      'name' => 'required',
      'qty' => 'required|numeric',
      'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
      'description' => 'nullable'
    ]);

    $newProduct = Product::create($data);

    session()->flash('success', 'Product created successfully!');
    return redirect()->route('product.index');
        }
}
