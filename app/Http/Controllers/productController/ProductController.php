<?php

namespace App\Http\Controllers\productController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StorePostRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = Product::with('images')->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        // dd($request->file('image'));
        // $product = new Product;
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->status = $request->status;
        // $product->price = $request->price;
        // $product->save();
        $product = Product::create($request->validated());
       
        foreach ($request->file('image') as $img) {
            $imgName =  uniqid() .'.'. $img->getClientOriginalExtension();
            $img->storeAs('public/img',$imgName);
            $image = new Image;
            $image->img_name = $imgName;
            $image->product_id = $product->id;
            $image->save();
        }
        return redirect()->route('products.index')->with('success','Created Successfully');
    }
    public function read($id)
    { 
        $product = Product::where('id', $id)->first();
        return view('products.read', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::find($id);
        // dd($product);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'price' => $request->price,
        ]);
        return redirect()->route('products.index')->with('success','Updated Successfully');
    }
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('products.index')->with('success','Delete Successfully');
    }
}
