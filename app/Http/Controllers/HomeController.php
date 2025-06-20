<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review; // Add this import
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard with featured products and reviews.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch featured products
        $products = Product::latest()->take(6)->get();
        
        // Fetch reviews with their relationships
        $reviews = Review::with(['product', 'user'])
                        ->latest()
                        ->take(3) // Get 3 most recent reviews
                        ->get();

        return view('home', compact('products', 'reviews'));
    }
}