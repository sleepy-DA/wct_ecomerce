@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Income Report</h2>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-light p-3">
                <h5>Total Orders</h5>
                <h3>{{ $totalOrders }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light p-3">
                <h5>Total Customers</h5>
                <h3>{{ $totalCustomers }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light p-3">
                <h5>Total Income</h5>
                <h3>${{ number_format($totalIncome, 2) }}</h3>
            </div>
        </div>
    </div>

    <h4>Recent Transactions</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th><th>Customer</th><th>Date</th><th>Amount</th>
            </tr>
        </thead>
        <tbody>
        @foreach($recentOrders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
