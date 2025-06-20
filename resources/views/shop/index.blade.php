<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Shop - Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --pink: #ff69b4;
            --dark-pink: #ff1493;
            --soft-pink: #ffebf3;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #343a40;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #fafafa;
            color: #333;
            line-height: 1.6;
        }
        
        .shop-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 80px 20px 60px;
        }
        
        .shop-header {
            text-align: center;
            font-size: 2.5rem;
            color: var(--dark-gray);
            margin-bottom: 40px;
            position: relative;
        }
        
        .shop-header::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--pink);
            margin: 15px auto 0;
            border-radius: 2px;
        }
        
        .shop-controls {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-bottom: 40px;
        }
        
        .search-bar {
            display: flex;
            max-width: 500px;
            width: 100%;
            position: relative;
        }
        
        .search-bar input[type="text"] {
            flex: 1;
            padding: 15px 20px 15px 50px;
            border: 2px solid var(--medium-gray);
            border-radius: 50px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        
        .search-bar input[type="text"]:focus {
            border-color: var(--pink);
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.2);
        }
        
        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--pink);
            font-size: 1.2rem;
        }
        
        .search-button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--pink);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
        }
        
        .search-button:hover {
            background: var(--dark-pink);
            transform: translateY(-50%) scale(1.05);
        }
        
        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        
        .filters select {
            padding: 12px 20px;
            border: 2px solid var(--medium-gray);
            border-radius: 50px;
            font-size: 1rem;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            outline: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        
        .filters select:focus {
            border-color: var(--pink);
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            cursor: pointer;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 1px solid var(--medium-gray);
        }
        
        .product-info {
            padding: 20px;
            text-align: center;
        }
        
        .product-name {
            font-size: 1.2rem;
            color: var(--dark-gray);
            margin-bottom: 10px;
        }

        .product-image-container {
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f8f9fa;
            border-radius: 10px 10px 0 0;
        }
        
        
        .product-description {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 15px;
            min-height: 60px;
        }
        
        .product-price {
            font-weight: bold;
            font-size: 1.4rem;
            color: var(--pink);
            margin-bottom: 10px;
        }
        
        .product-rating {
            color: gold;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }
        
        .add-to-cart-btn {
            background: linear-gradient(135deg, var(--pink), var(--dark-pink));
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
            width: 100%;
            max-width: 200px;
            text-align: center;
        }
        
        .add-to-cart-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 20, 147, 0.4);
        }
        
        .no-results {
            text-align: center;
            font-size: 1.2rem;
            color: var(--dark-gray);
            padding: 40px 0;
            grid-column: 1 / -1;
        }
        
        /* Updated Pagination Styles */
/* Updated Pagination Styles */
.pagination {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 40px;
}

.pagination-info {
    margin-bottom: 15px;
    color: var(--dark-gray);
    font-size: 0.9rem;
}

.pagination-links {
    display: flex;
    gap: 8px;
    list-style: none;
    padding: 0;
    flex-wrap: wrap;
    justify-content: center;
}

.pagination-links li {
    display: inline-block;
}

.pagination-links li a,
.pagination-links li span {
    display: inline-block;
    padding: 8px 16px;
    background: var(--soft-pink);
    color: var(--pink);
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
    min-width: 40px;
    text-align: center;
}

.pagination-links li a:hover {
    background: var(--pink);
    color: white;
}

.pagination-links li.active span {
    background: var(--pink);
    color: white;
}

.pagination-links li.disabled span {
    background: var(--light-gray);
    color: #999;
    cursor: not-allowed;
}
        
        .cart-toggle-btn {
            background: linear-gradient(135deg, var(--pink), var(--dark-pink));
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .cart-toggle-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 20, 147, 0.4);
        }
        
        .cart-summary {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            display: none;
        }
        
        .cart-summary h3 {
            margin-top: 0;
            color: var(--dark-gray);
            border-bottom: 1px solid var(--medium-gray);
            padding-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .cart-summary ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        
        .cart-summary li {
            padding: 10px 0;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
        }
        
        .cart-summary .total {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid var(--medium-gray);
            display: flex;
            justify-content: space-between;
        }
        
        .home-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--soft-pink);
            color: var(--pink);
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            margin-bottom: 20px;
        }
        
        .home-button:hover {
            background: var(--pink);
            color: white;
            transform: translateY(-3px);
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--pink);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transform: translateX(200%);
            transition: transform 0.3s ease-out;
            z-index: 1000;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .header-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .shop-header {
                font-size: 2rem;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }
            
            .shop-controls {
                flex-direction: column;
                align-items: center;
            }
            
            .search-bar, .filters {
                width: 100%;
                max-width: 100%;
            }
            
            .header-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        .checkout-btn {
            background: linear-gradient(135deg, var(--pink), var(--dark-pink));
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
            width: 100%;
            max-width: 200px;
            text-align: center;
            margin-top: 15px;
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 20, 147, 0.4);
        }

        /* Product Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .product-modal {
            background: white;
            border-radius: 20px;
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            position: relative;
            transform: translateY(-50px);
            transition: transform 0.4s ease;
        }

        .modal-overlay.active .product-modal {
            transform: translateY(0);
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.8rem;
            color: #777;
            cursor: pointer;
            z-index: 10;
            background: none;
            border: none;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s;
        }

        .close-modal:hover {
            color: var(--dark-pink);
            background: var(--soft-pink);
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            padding: 40px;
        }

        @media (min-width: 992px) {
            .modal-content {
                flex-direction: row;
                gap: 40px;
            }
        }

        .modal-image-container {
            flex: 1;
        }

        .modal-image {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            border-radius: 15px;
            background: var(--soft-pink);
        }

        .modal-details {
            flex: 1;
        }

        .modal-header {
            margin-bottom: 25px;
        }

        .modal-title {
            font-size: 2rem;
            color: var(--dark-gray);
            margin-bottom: 10px;
        }

        .modal-price {
            font-size: 1.8rem;
            color: var(--pink);
            font-weight: bold;
            margin-bottom: 15px;
        }

        .modal-rating {
            color: gold;
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .modal-description {
            margin-bottom: 25px;
            font-size: 1.1rem;
            line-height: 1.7;
            color: #555;
        }

        .modal-tabs {
            display: flex;
            border-bottom: 1px solid var(--medium-gray);
            margin-bottom: 25px;
        }

        .tab-btn {
            padding: 12px 25px;
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            color: #777;
            cursor: pointer;
            position: relative;
            transition: all 0.3s;
        }

        .tab-btn.active {
            color: var(--pink);
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--pink);
        }

        .tab-content {
            display: none;
            padding: 15px 0;
            animation: fadeIn 0.4s ease;
        }

        .tab-content.active {
            display: block;
        }

        .tab-content h3 {
            margin-bottom: 15px;
            color: var(--dark-gray);
            font-size: 1.3rem;
        }

        .tab-content p {
            margin-bottom: 15px;
            line-height: 1.7;
            color: #555;
        }

        .tab-content ul {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .tab-content li {
            margin-bottom: 10px;
        }

        .modal-reviews {
            max-height: 200px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .review {
            padding: 15px 0;
            border-bottom: 1px solid var(--light-gray);
        }

        .review:last-child {
            border-bottom: none;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .review-name {
            font-weight: 600;
            color: var(--dark-gray);
        }

        .review-date {
            color: #777;
            font-size: 0.9rem;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @media (max-width: 768px) {
            .modal-content {
                padding: 30px 20px;
            }
            
            .modal-title {
                font-size: 1.7rem;
            }
            
            .modal-price {
                font-size: 1.5rem;
            }
            
            .modal-tabs {
                flex-wrap: wrap;
            }
            
            .tab-btn {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
            
            .modal-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="shop-container">
        <div class="header-buttons">
            <a href="/" class="home-button">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a>
            
            <button onclick="toggleCart()" class="cart-toggle-btn">
                <i class="fas fa-shopping-cart"></i> View Cart (<span id="cart-count">{{ count(session('cart', [])) }}</span>)
            </button>
        </div>

        <div id="cartBox" class="cart-summary">
            <h3><i class="fas fa-shopping-cart"></i> Your Cart</h3>
            <div id="cart-content">
                @if(count(session('cart', [])) > 0)
                    <ul>
                        @foreach (session('cart', []) as $id => $item)
                        <li>
                            <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                            <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="total">
                        <span>Total:</span>
                        <span>${{ number_format(array_sum(array_map(function($item) { 
                            return $item['price'] * $item['quantity']; 
                        }, session('cart', []))), 2) }}</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="checkout-btn">Checkout</a>
                @else
                    <p>Your cart is empty</p>
                @endif
            </div>
        </div>

        <h1 class="shop-header">Our Beauty Products</h1>

        <form class="shop-controls" action="{{ route('shop.index') }}" method="GET">
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
                <button type="submit" class="search-button">Search</button>
            </div>
            
            <div class="filters">
                <select name="category">
                    <option value="">All Categories</option>
                    <option value="serum" {{ request('category') == 'serum' ? 'selected' : '' }}>Serum</option>
                    <option value="moisturizer" {{ request('category') == 'moisturizer' ? 'selected' : '' }}>Moisturizer</option>
                    <option value="toner" {{ request('category') == 'toner' ? 'selected' : '' }}>Toner</option>
                    <option value="balm" {{ request('category') == 'balm' ? 'selected' : '' }}>Balm</option>
                    <option value="cream" {{ request('category') == 'cream' ? 'selected' : '' }}>Cream</option>
                    <option value="suncreen" {{ request('category') == 'suncreen' ? 'selected' : '' }}>Suncreen</option>
                    <option value="cleanser" {{ request('category') == 'cleanser' ? 'selected' : '' }}>Cleanser</option>
                </select>
                
                <select name="sort">
                    <option value="">Sort By</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </div>
        </form>

        <div class="products-grid">
            @forelse ($products as $product)
            <div class="product-card" 
                 data-id="{{ $product->id }}"
                 data-name="{{ $product->name }}"
                 data-description="{{ $product->description }}"
                 data-price="{{ $product->price }}"
                 data-rating="{{ $product->rating }}"
                 data-ingredients="{{ $product->ingredients ?? 'N/A' }}"
                 data-how-to-use="{{ $product->how_to_use ?? 'N/A' }}"
                 data-benefits="{{ $product->benefits ?? 'N/A' }}">
                <div class="product-image-container">
    <!-- Debug: {{ $product->image }} -->
    @if($product->image)
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
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="product-description">{{ $product->description }}</p>
                    <p class="product-price">${{ number_format($product->price, 2) }}</p>
                    <a href="#" 
                       class="add-to-cart-btn" 
                       data-id="{{ $product->id }}"
                       data-name="{{ $product->name }}"
                       data-price="{{ $product->price }}"
                       data-image="{{ $product->image ? asset('storage/' . $product->image) : '' }}">
                       Add to Cart
                    </a>
                </div>
            </div>
            @empty
            <div class="no-results">
                <p>No products found</p>
            </div>
            @endforelse
        </div>

<!-- Replace your existing pagination HTML with this: -->
<div class="pagination">
    <div class="pagination-info">
        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
    </div>
    
    <ul class="pagination-links">
        {{-- Previous Page Link --}}
        @if ($products->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
            @if ($page == $products->currentPage())
                <li class="active"><span>{{ $page }}</span></li>
            @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($products->hasMorePages())
            <li><a href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
</div>
    
    </div>
    
    <div class="notification" id="notification">
        Product added to cart successfully!
    </div>

    <!-- Product Details Modal -->
    <div class="modal-overlay" id="productModal">
        <div class="product-modal">
            <button class="close-modal" id="closeModal">&times;</button>
            <div class="modal-content">
                <div class="modal-image-container">
                    <img src="" alt="Product Image" class="modal-image" id="modalImage">
                </div>
                <div class="modal-details">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modalTitle"></h2>
                        <div class="modal-price" id="modalPrice"></div>
                        <div class="modal-rating" id="modalRating"></div>
                        <p class="modal-description" id="modalDescription"></p>
                    </div>
                    
                    <div class="modal-tabs">
                        <button class="tab-btn active" data-tab="how-to-use">How to Use</button>
                        <button class="tab-btn" data-tab="ingredients">Ingredients</button>
                        <button class="tab-btn" data-tab="benefits">Benefits</button>
                        <button class="tab-btn" data-tab="reviews">Reviews</button>
                    </div>
                    
                    <div class="tab-content active" id="how-to-use-content">
                        <h3>How to Use</h3>
                        <p id="howToUseText"></p>
                    </div>
                    
                    <div class="tab-content" id="ingredients-content">
                        <h3>Key Ingredients</h3>
                        <ul id="ingredientsList"></ul>
                    </div>
                    
                    <div class="tab-content" id="benefits-content">
                        <h3>Product Benefits</h3>
                        <p id="benefitsText"></p>
                    </div>
                    
                    <div class="tab-content" id="reviews-content">
                        <h3>Customer Reviews</h3>
                        <div class="modal-reviews" id="reviewsContainer">
                            <!-- Reviews will be populated here -->
                        </div>
                    </div>
                    
                    <div class="modal-actions">
                        <a href="#" 
                           class="add-to-cart-btn" 
                           id="modalAddToCart">
                           <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                        <button class="close-modal-btn add-to-cart-btn" style="background: var(--soft-pink); color: var(--pink);">
                            <i class="fas fa-times"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle cart visibility
        function toggleCart() {
            const cartBox = document.getElementById('cartBox');
            cartBox.style.display = cartBox.style.display === 'none' ? 'block' : 'none';
        }
        
        // Product Modal functionality
        const productModal = document.getElementById('productModal');
        const closeModal = document.getElementById('closeModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalPrice = document.getElementById('modalPrice');
        const modalRating = document.getElementById('modalRating');
        const modalDescription = document.getElementById('modalDescription');
        const modalImage = document.getElementById('modalImage');
        const howToUseText = document.getElementById('howToUseText');
        const ingredientsList = document.getElementById('ingredientsList');
        const benefitsText = document.getElementById('benefitsText');
        const reviewsContainer = document.getElementById('reviewsContainer');
        const modalAddToCart = document.getElementById('modalAddToCart');
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        const closeModalBtn = document.querySelector('.close-modal-btn');
        
        // Open modal when product card is clicked
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('click', function(e) {
                // Don't open modal if clicking on Add to Cart button
                if (e.target.closest('.add-to-cart-btn')) return;
                
                const product = {
                    id: this.dataset.id,
                    name: this.dataset.name,
                    description: this.dataset.description,
                    price: this.dataset.price,
                    image: this.querySelector('.product-image').src,
                    rating: this.dataset.rating,
                    ingredients: this.dataset.ingredients,
                    howToUse: this.dataset.howToUse,
                    benefits: this.dataset.benefits
                };
                
                // Populate modal with product data
                modalTitle.textContent = product.name;
                modalPrice.textContent = `$${parseFloat(product.price).toFixed(2)}`;
                modalDescription.textContent = product.description;
                modalImage.src = product.image || '';
                modalImage.alt = product.name;
                
                // Create rating stars
                let ratingHTML = '';
                const rating = parseInt(product.rating);
                for (let i = 1; i <= 5; i++) {
                    ratingHTML += i <= rating ? '★' : '☆';
                }
                modalRating.innerHTML = ratingHTML;
                
                // Populate additional info
                howToUseText.textContent = product.howToUse;
                
                // Create ingredients list
                ingredientsList.innerHTML = '';
                product.ingredients.split(', ').forEach(ingredient => {
                    const li = document.createElement('li');
                    li.textContent = ingredient;
                    ingredientsList.appendChild(li);
                });
                
                benefitsText.textContent = product.benefits;
                
                // Generate sample reviews
                reviewsContainer.innerHTML = '';
                const reviews = [
                    { name: 'Sarah J.', date: '2023-10-15', rating: 5, comment: 'This product transformed my skin! I noticed a difference after just one week of use.' },
                    { name: 'Michael T.', date: '2023-09-28', rating: 4, comment: 'Really good product. My skin feels hydrated all day long. Would recommend.' },
                    { name: 'Emma R.', date: '2023-09-10', rating: 5, comment: 'Absolutely love this! It has become an essential part of my skincare routine.' }
                ];
                
                reviews.forEach(review => {
                    const reviewEl = document.createElement('div');
                    reviewEl.className = 'review';
                    
                    let stars = '';
                    for (let i = 1; i <= 5; i++) {
                        stars += i <= review.rating ? '★' : '☆';
                    }
                    
                    reviewEl.innerHTML = `
                        <div class="review-header">
                            <div>
                                <span class="review-name">${review.name}</span>
                                <div class="modal-rating">${stars}</div>
                            </div>
                            <span class="review-date">${review.date}</span>
                        </div>
                        <p>${review.comment}</p>
                    `;
                    reviewsContainer.appendChild(reviewEl);
                });
                
                // Set up Add to Cart button in modal
                modalAddToCart.dataset.id = product.id;
                modalAddToCart.dataset.name = product.name;
                modalAddToCart.dataset.price = product.price;
                modalAddToCart.dataset.image = product.image;
                
                // Show modal
                productModal.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            });
        });
        
        // Close modal
        function closeProductModal() {
            productModal.classList.remove('active');
            document.body.style.overflow = 'auto'; // Re-enable scrolling
        }
        
        closeModal.addEventListener('click', closeProductModal);
        closeModalBtn.addEventListener('click', closeProductModal);
        
        // Close modal when clicking outside content
        productModal.addEventListener('click', function(e) {
            if (e.target === productModal) {
                closeProductModal();
            }
        });
        
        // Tab switching
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all tabs
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked tab
                this.classList.add('active');
                const tabId = this.dataset.tab;
                document.getElementById(`${tabId}-content`).classList.add('active');
            });
        });
        
        // Add to cart functionality
        document.querySelector('.products-grid').addEventListener('click', async function(e) {
            if (e.target.classList.contains('add-to-cart-btn')) {
                e.preventDefault();
                await addToCart(e.target);
            }
        });
        
        // Add to cart from modal
        modalAddToCart.addEventListener('click', async function(e) {
            e.preventDefault();
            await addToCart(this);
        });
        
        // Common add to cart function
        async function addToCart(button) {
            const productId = button.getAttribute('data-id');
            
            try {
                // Add to cart via AJAX
                const response = await fetch('/cart/add/' + productId, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({})
                });
                
                if(response.ok) {
                    const data = await response.json();
                    // Update cart count
                    document.getElementById('cart-count').textContent = data.cart_count;
                    
                    // Always update cart content
                    document.getElementById('cart-content').innerHTML = data.cart_html;
                    
                    // Show notification
                    const notification = document.getElementById('notification');
                    notification.classList.add('show');
                    
                    setTimeout(() => {
                        notification.classList.remove('show');
                    }, 3000);
                }
            } catch (error) {
                console.error('Error adding to cart:', error);
            }
        }
        
        // Function to refresh cart content
        async function refreshCart() {
            try {
                const response = await fetch('/cart/summary');
                const cartHtml = await response.text();
                document.getElementById('cart-content').innerHTML = cartHtml;
            } catch (error) {
                console.error('Error refreshing cart:', error);
            }
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Hide cart initially
            document.getElementById('cartBox').style.display = 'none';
        });
    </script>
</body>
</html>