<?php

namespace App\Http\Controllers\productController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',compact('products'));
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        // dd($request->all());
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'price' => $request->price
        ]);
        return redirect()->route('products.index');

    }
    public function read($id){
        $product = Product::where('id',$id)->first();
        return view('products.read',compact('product'));
    }
    public function edit($id){
        $product = Product::find($id);
        // dd($product);
        return view('products.edit',compact('product'));
    }
    public function update(Request $request , $id){
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'price' =>$request->price,
        ]);
        return redirect()->route('products.index');
    }
}
