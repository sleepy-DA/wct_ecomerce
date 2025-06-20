@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Order Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th><th>Customer</th><th>Date</th><th>Amount</th><th>Status</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    {{-- Fixed route name --}}
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
    {{ $orders->links() }}
</div>
</div>
@endsection