@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Order #{{ $order->id }}</h2>
    
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Customer Information</h4>
                    <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div class="col-md-6">
                    <h4>Shipping Details</h4>
                    {{-- Removed shipping_address --}}
                    <p><strong>City:</strong> {{ $order->city }}</p>
                    <p><strong>Country:</strong> {{ $order->country }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-info">{{ ucfirst($order->status) }}</span></p>
                </div>
            </div>
        </div>
    </div>
    
    <h4>Order Summary</h4>
    <table class="table table-bordered">
        <tr>
            <th>Subtotal</th>
            <td>${{ number_format($order->total / 1.07, 2) }}</td>
        </tr>
        <tr>
            <th>Tax (7%)</th>
            <td>${{ number_format($order->total - ($order->total / 1.07), 2) }}</td>
        </tr>
        <tr class="table-active">
            <th>Total</th>
            <td>${{ number_format($order->total, 2) }}</td>
        </tr>
    </table>
</div>
@endsection