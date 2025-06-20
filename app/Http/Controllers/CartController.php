<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function clearCart()
{
    session()->forget('cart');
    return redirect()->route('cart.index')->with('success', 'Cart cleared!');
}

public function getCartCount()
{
    return response()->json([
        'count' => count(session('cart', []))
    ]);
}

public function getCartSummary()
{
    $cart = session('cart', []);
    $total = array_sum(array_map(function($item) {
        return $item['price'] * $item['quantity'];
    }, $cart));
    
    return response()->json([
        'count' => count($cart),
        'html' => view('partials.cart_summary', compact('cart', 'total'))->render()
    ]);
}
}
