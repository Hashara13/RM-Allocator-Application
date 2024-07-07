<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string'
        ]);
        $newProduct = Product::create($data);
        return redirect(route('product.index'));
    }
    public function update(Product $product)
    {

        return view('products.update', ['product.update' => $product]);
    }
    public function new(Product $product,Request $request)
    {
 

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string'
        ]);
        $product->update($data);
        return redirect(route('product.index'))->with('Update successfully');

    }
    public function delete(Product $product)
    {

        $product->delete();
        return redirect(route('product.index'))->with('Delete successfully');

}
}