<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::latest()->paginate(10);
    return view('admin.orders.index', compact('orders'));
}

public function show(Order $order)
{
    return view('admin.orders.show', compact('order'));
}
}
