<?php

namespace App\Http\Controllers\productController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('products.index',compact('products'));
    }
}
