<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::withCount('products')->paginate(10);
        return view('category', compact('categories'));
    }
}
