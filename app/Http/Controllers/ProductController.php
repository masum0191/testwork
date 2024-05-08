<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('categories', 'features')->where('user_id', \auth()->user()->id)->paginate(10);
        return view('products', compact('products'));
    }
}
