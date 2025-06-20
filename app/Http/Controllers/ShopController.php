<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{
    public function index(Request $request)
{
    // Get products from database
    $products = Product::query();

    // Apply search filter
    if ($request->filled('search')) {
        $search = $request->query('search');
        $products->where(function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        });
    }

    // Apply category filter - UPDATED
    if ($request->filled('category')) {
        $category = $request->query('category');
        $products->where('category', $category);
    }

    // Apply sorting
    $sort = $request->query('sort', '');
    switch ($sort) {
        case 'price_asc':
            $products->orderBy('price', 'asc');
            break;
        case 'price_desc':
            $products->orderBy('price', 'desc');
            break;
        default:
            $products->latest();
            break;
    }

    // Paginate results
    $products = $products->paginate(8);

    return view('shop.index', compact('products'));
}

    public function show($id)
    {
        // Get product from database
        $product = Product::with('category')->findOrFail($id);
        return view('shop.show', compact('product'));
    }

    public function addToCart($id)
    {
        // Get product from database
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        
        // Calculate total
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        
        // Return updated cart HTML
        $cartHtml = view('partials.cart_summary', [
            'cart' => $cart,
            'total' => $total
        ])->render();

        return response()->json([
            'success' => true,
            'cart_count' => count($cart),
            'cart_html' => $cartHtml
        ]);
    }
}