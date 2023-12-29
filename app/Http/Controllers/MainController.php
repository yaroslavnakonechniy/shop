<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index', compact('products'));
    }


    public function categories(){
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function category($code){
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function show_product($category, $product_id = null){
        $product = Product::find($product_id);
        return view('show_product', compact('product'));
    }
}
