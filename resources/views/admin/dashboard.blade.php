@extends('admin.layouts.app')

@section('content')
<div class="row mt-4">
    <!-- Stats Cards -->
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-baby-blue">
            <div class="card-body text-center">
                <h5 class="card-title">Total Products</h5>
                <p class="card-text">{{ $productCount }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-pink">
            <div class="card-body text-center">
                <h5 class="card-title">Total Orders</h5>
                <p class="card-text">{{ $orderCount }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-light-pink">
            <div class="card-body text-center">
                <h5 class="card-title">Total Customers</h5>
                <p class="card-text">{{ $customerCount }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-white border border-baby-blue">
            <div class="card-body text-center">
                <h5 class="card-title">Total Income</h5>
                <p class="card-text">${{ number_format($totalIncome, 2) }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="recent-orders">
    <h3 class="mb-4" style="color: #89CFF0;">Recent Orders</h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>
                        <span class="status-badge 
                            @if($order->status == 'completed') status-completed
                            @elseif($order->status == 'shipped') status-shipped
                            @else status-pending @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Top Selling Products -->
<div class="top-products">
    <h3 class="mb-4" style="color: #FFB6C1;">Top Selling Products</h3>
    <div class="row">
        @foreach($topProducts as $product)
        <div class="col-md-2 col-6 mb-4">
            <div class="product-card">
                
                <div class="card-body text-center p-2">
                    <h6 class="card-title mb-1">{{ $product->name }}</h6>
                    <p class="mb-1 text-success">Sold: {{ $product->order_count }}</p>
                    <p class="mb-0"><strong>${{ number_format($product->price, 2) }}</strong></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection