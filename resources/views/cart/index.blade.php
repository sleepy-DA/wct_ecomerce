@extends('layouts.app')
@section('content')
<style>
    :root {
        --pink: #ff7eb9;
        --light-gray: #f8f9fa;
        --medium-gray: #e9ecef;
        --dark-gray: #212529;
    }

    .cart-container {
        padding: 60px 0 40px;
        background-color: var(--light-gray);
    }
    
    .cart-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .cart-title {
        font-size: 2rem;
        font-weight: 600;
        color: var(--dark-gray);
        margin-bottom: 10px;
    }
    
    .cart-subtitle {
        color: #6c757d;
        font-size: 1rem;
    }
    
    .cart-content {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        padding: 30px;
    }
    
    /* Table Styles */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .cart-table thead th {
        padding: 15px;
        text-align: left;
        border-bottom: 2px solid var(--medium-gray);
    }
    
    .cart-table tbody td {
        padding: 20px 15px;
        border-bottom: 1px solid var(--medium-gray);
    }
    
    .product-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }
    
    .product-name {
        font-weight: 600;
        color: var(--dark-gray);
    }
    
    .product-sku {
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    /* Action Buttons */
    .btn-remove {
        color: #dc3545;
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
    }
    
    .quantity-control {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .qty-btn {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: var(--light-gray);
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: var(--transition);
    }

    .qty-btn:hover {
        background: var(--medium-gray);
    }
    
    /* Summary Section */
    .cart-summary {
        background: var(--light-gray);
        border-radius: 8px;
        padding: 20px;
        margin-top: 20px;
        text-align: right;
    }
    
    .summary-value {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--pink);
    }
    
    /* Action Buttons */
    .cart-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }
    
    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
    }
    
    .btn-outline {
        background: transparent;
        color: var(--pink);
        border: 1px solid var(--pink);
    }
    
    .btn-solid {
        background: var(--pink);
        color: white;
    }
    
    /* Empty State */
    .empty-cart {
        text-align: center;
        padding: 40px 20px;
    }
    
    .empty-cart-icon {
        font-size: 3rem;
        color: var(--pink);
        margin-bottom: 20px;
    }
    
    .empty-cart h2 {
        color: var(--dark-gray);
        margin-bottom: 15px;
    }
</style>

<div class="container cart-container">
    <div class="cart-header">
        <h1 class="cart-title">Your Shopping Cart</h1>
        <p class="cart-subtitle">Review your items or continue shopping</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    @if ($cart && count($cart))
        <div class="cart-content">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $id => $item)
                        @php $itemTotal = $item['price'] * $item['quantity']; $total += $itemTotal; @endphp
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="product-image">
                                    <div>
                                        <div class="product-name">{{ $item['name'] }}</div>
                                        <div class="product-sku">SKU: {{ $item['sku'] ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>
                                <div class="quantity-control">
                                    <span>{{ $item['quantity'] }}</span>
                                </div>
                            </td>
                            <td>${{ number_format($itemTotal, 2) }}</td>
                            <td>

                            <a href="{{ route('cart.remove', $id) }}" class="btn-remove">
    <i class="fas fa-trash-alt"></i> Remove
</a>
                                <button class="btn-remove">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="cart-summary">
                <strong>Order Total:</strong>
                <span class="summary-value">${{ number_format($total, 2) }}</span>
            </div>

            <div class="cart-actions">
                <a href="{{ route('shop.index') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Continue Shopping
                </a>
                <div>
                    <a href="{{ route('cart.clear') }}" class="btn btn-outline">
                        <i class="fas fa-trash-alt"></i> Clear Cart
                    </a>
                    <a href="{{ route('checkout') }}" class="btn btn-solid">
                        Proceed to Checkout <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="empty-cart">
            <div class="empty-cart-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h2>Your Cart is Empty</h2>
            <p>Looks like you haven't added anything to your cart yet.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-solid">
                <i class="fas fa-spa"></i> Explore Products
            </a>
        </div>
    @endif
</div>
@endsection