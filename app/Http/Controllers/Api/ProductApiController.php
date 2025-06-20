<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of all products.
     */
    public function index()
    {
        // Fetch all products and return as JSON
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate incoming data (you can customize rules)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
        ]);

        // Create a new product with validated data
        $product = Product::create($validated);

        // Return the created product with 201 status code
        return response()->json($product, 201);
    }
}
