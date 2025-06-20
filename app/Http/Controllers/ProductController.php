<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = Product::latest()->paginate(8); // or ->get() if you don’t want pagination
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        // Only show active products
        return view('products.show', compact('product'));
    }
}

