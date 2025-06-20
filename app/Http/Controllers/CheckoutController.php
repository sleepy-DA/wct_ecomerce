<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;
        
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $tax = $subtotal * 0.07;
        $total = $subtotal + $tax;

        return view('checkout', compact('cart', 'subtotal', 'tax', 'total'));
    }

    public function store(Request $request)
    {
        // Validate request data - REMOVED 'address'
        $validated = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            // REMOVED: 'address' => 'required|string',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'shipping_method' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Get cart data
        $cart = session()->get('cart', []);
        $subtotal = 0;
        
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $tax = $subtotal * 0.07;
        $total = $subtotal + $tax;

        // Create order - REMOVED shipping_address
        $order = new Order();
        $order->user_id = Auth::id();
        $order->email = $validated['email'];
        $order->first_name = $validated['first_name'];
        $order->last_name = $validated['last_name'];
        $order->city = $validated['city'];
        $order->country = $validated['country'];
        $order->shipping_method = $validated['shipping_method'];
        $order->payment_method = $validated['payment_method'];
        $order->total = $total;
        $order->status = 'pending';
        $order->save();

        // Store order details in session - REMOVED address
        session()->flash('order_confirmation', [
            'order_id' => $order->id,
            'email' => $validated['email'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            // REMOVED: 'address' => $validated['address'],
            'city' => $validated['city'],
            'country' => $validated['country'],
            'shipping_method' => $validated['shipping_method'],
            'payment_method' => $validated['payment_method'],
            'cart' => $cart,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total
        ]);

        // Create order items
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('order.confirmation', $order->id);
    }
}