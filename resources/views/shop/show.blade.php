@extends('layouts.shop')

@section('content')
<style>
    .product-detail-container {
        padding-top: 80px;
        padding-bottom: 80px;
    }
    
    .product-detail {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow);
    }

    .product-image-container {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        padding: 30px;
    }
    
    .product-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }
    
    .product-info {
        padding: 30px;
    }
    
    .product-name {
        font-size: 2.2rem;
        color: var(--dark-gray);
        margin-bottom: 10px;
    }
    
    .product-price {
        font-size: 1.8rem;
        color: var(--pink);
        font-weight: bold;
        margin-bottom: 15px;
    }
    
    .product-rating {
        color: gold;
        font-size: 1.4rem;
        margin-bottom: 20px;
    }
    
    .product-description {
        font-size: 1.1rem;
        color: var(--dark-gray);
        margin-bottom: 25px;
        line-height: 1.7;
    }
    
    .detail-section {
        margin-bottom: 25px;
    }
    
    .detail-section h4 {
        color: var(--pink);
        font-size: 1.2rem;
        margin-bottom: 8px;
    }
    
    .detail-section p {
        font-size: 1rem;
        color: var(--dark-gray);
        line-height: 1.6;
    }
    
    .back-button {
        display: inline-block;
        background: linear-gradient(135deg, var(--pink), var(--dark-pink));
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
        margin-bottom: 30px;
    }
    
    .back-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 20, 147, 0.4);
    }
    
    .add-to-cart-btn {
        display: inline-block;
        background: linear-gradient(135deg, var(--pink), var(--dark-pink));
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }
    
    @media (max-width: 768px) {
        .product-detail {
            grid-template-columns: 1fr;
        }
        
        .product-image {
            height: 300px;
        }
    }
</style>

<div class="container product-detail-container">
    <a href="{{ route('shop.index') }}" class="back-button">← Back to Shop</a>
    
    <div class="product-detail">
        <div class="product-image-container">
    @if($product->image)
        <!-- Debug: {{ $product->image_url }} -->
        <img src="{{ $product->image_url }}" 
             alt="{{ $product->name }}" 
             class="product-image">
    @else
        <div class="no-image-placeholder">
            <i class="fas fa-image fa-3x text-muted"></i>
        </div>
    @endif
</div>
        <div class="product-info">
            <h2 class="product-name">{{ $product->name }}</h2>
            <p class="product-price">${{ number_format($product->price, 2) }}</p>
            <p class="product-description">{{ $product->description }}</p>
            
            <div class="detail-section">
                <h4>Brand</h4>
                <p>{{ $product['brand'] ?? 'N/A' }}</p>
            </div>
            
            <div class="detail-section">
                <h4>Skin Type</h4>
                <p>{{ $product['skin_type'] ?? 'N/A' }}</p>
            </div>
            
            <div class="detail-section">
                <h4>Size</h4>
                <p>{{ $product['size'] ?? 'N/A' }}</p>
            </div>
            
            <div class="detail-section">
                <h4>Benefits</h4>
                <p>{{ $product['benefits'] ?? 'N/A' }}</p>
            </div>
            
            <div class="detail-section">
                <h4>Ingredients</h4>
                <p>{{ $product['ingredients'] ?? 'N/A' }}</p>
            </div>
            
            <div class="detail-section">
                <h4>How to Use</h4>
                <p>{{ $product['how_to_use'] ?? 'N/A' }}</p>
            </div>
            
            <a href="{{ route('cart.add', $product->id) }}" class="add-to-cart-btn">Add to Cart</a>
        </div>
    </div>
</div>
@endsection