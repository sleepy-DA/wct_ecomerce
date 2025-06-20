<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Natural Skincare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --pink: #ff7eb9;
            --light-pink: #ffecf3;
            --white: #ffffff;
            --light-gray: #f5f7fa;
            --medium-gray: #e1e5eb;
            --dark-gray: #2d3748;
            --text-gray: #718096;
            --shadow: 0 5px 15px rgba(0,0,0,0.05);
            --transition: all 0.25s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-gray);
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .checkout-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .checkout-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 10px;
        }

        .checkout-subtitle {
            color: var(--text-gray);
            font-size: 1rem;
        }

        .checkout-content {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        @media (min-width: 768px) {
            .checkout-content {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Form Section */
        .form-section {
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 30px;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--medium-gray);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--pink);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 6px;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            transition: var(--transition);
            background: var(--light-gray);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--pink);
            box-shadow: 0 0 0 2px rgba(255, 126, 185, 0.15);
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        /* Order Summary */
        .order-summary {
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 25px;
        }

        .order-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--medium-gray);
        }

        .order-items {
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            gap: 15px;
            padding: 12px 0;
            border-bottom: 1px solid var(--medium-gray);
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            background: var(--light-pink);
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .item-price {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .item-quantity {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .order-summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 0.95rem;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            font-size: 1.1rem;
            font-weight: 600;
            border-top: 1px solid var(--medium-gray);
            margin-top: 10px;
        }

        .total-price {
            color: var(--pink);
        }

        .payment-method {
            margin: 20px 0;
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            cursor: pointer;
        }

        .payment-option.active {
            border-color: var(--pink);
            background: var(--light-pink);
        }

        .payment-option i {
            font-size: 1.5rem;
            color: var(--dark-gray);
        }

        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background: var(--pink);
            color: white;
        }

        .btn-primary:hover {
            background: #ff5a9a;
        }
        
        .btn-secondary {
            background: var(--medium-gray);
            color: var(--dark-gray);
            margin-top: 10px;
        }
        
        .btn-secondary:hover {
            background: #cbd5e0;
        }

        .secure-checkout {
            text-align: center;
            margin: 15px 0;
            font-size: 0.9rem;
            color: var(--text-gray);
        }

        .secure-checkout i {
            color: #48bb78;
            margin-right: 5px;
        }

        /* Responsive Adjustments */
        @media (max-width: 767px) {
            .checkout-container {
                padding: 30px 15px;
            }
            
            .checkout-title {
                font-size: 1.6rem;
            }
            
            .form-section {
                padding: 20px;
            }
            
            .order-summary {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <div class="checkout-header">
            <h1 class="checkout-title">Complete Your Order</h1>
            <p class="checkout-subtitle">Secure checkout with our natural skincare specialists</p>
        </div>
        
        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            
            <div class="checkout-content">
                <!-- Left Column - Checkout Form -->
                <div class="form-section">
                    <h2 class="section-title"><i class="fas fa-user"></i> Contact Information</h2>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="jane.smith@example.com" required>
                    </div>
                    
                    <h2 class="section-title"><i class="fas fa-map-marker-alt"></i> Shipping Address</h2>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="first_name" class="form-control" placeholder="Jane" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="last_name" class="form-control" placeholder="Smith" required>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" placeholder="New York" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" name="country" class="form-control" required>
                            <option value="United States">United States</option>
                            <option value="Canada">Canada</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Australia">Australia</option>
                        </select>
                    </div>
                    
                    <h2 class="section-title"><i class="fas fa-truck"></i> Shipping Method</h2>
                    
                    <div class="form-group">
                        <select name="shipping_method" class="form-control" required>
                            <option value="Standard Shipping">Standard Shipping (3-5 days) - FREE</option>
                            <option value="Express Shipping">Express Shipping (1-2 days) - $9.99</option>
                        </select>
                    </div>
                    
                    <h2 class="section-title"><i class="fas fa-credit-card"></i> Payment</h2>
                    
                    <div class="payment-method">
                        <div class="payment-option active" data-value="card">
                            <i class="fab fa-cc-visa"></i>
                            <div>
                                <div>Credit/Debit Card</div>
                                <div style="font-size: 0.85rem; color: var(--text-gray);">Pay securely with your card</div>
                            </div>
                        </div>
                        
                        <div class="payment-option" data-value="aba">
                            <i class="fas fa-university"></i>
                            <div>
                                <div>ABA</div>
                                <div style="font-size: 0.85rem; color: var(--text-gray);">ABA Bank Transfer</div>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="payment_method" id="payment_method" value="card">
                    
                    <!-- Back to Home Button -->
                    <a href="/" class="btn btn-secondary">Back to Home</a>
                </div>
                
                <!-- Right Column - Order Summary -->
                <div class="order-summary">
                    <h2 class="order-title">Order Summary</h2>
                    
                    <div class="order-items">
                        @foreach($cart as $id => $item)
                        <div class="order-item">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="item-image">
                            <div class="item-details">
                                <div class="item-name">{{ $item['name'] }}</div>
                                <div class="item-price">${{ number_format($item['price'], 2) }}</div>
                                <div class="item-quantity">Quantity: {{ $item['quantity'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    @php
                        // Calculate totals based on cart data
                        $subtotal = 0;
                        foreach($cart as $item) {
                            $subtotal += $item['price'] * $item['quantity'];
                        }
                        $tax = $subtotal * 0.07; // 7% tax
                        $total = $subtotal + $tax;
                    @endphp
                    
                    <div class="order-summary-row">
                        <span>Subtotal</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    
                    <div class="order-summary-row">
                        <span>Shipping</span>
                        <span>FREE</span>
                    </div>
                    
                    <div class="order-summary-row">
                        <span>Tax</span>
                        <span>${{ number_format($tax, 2) }}</span>
                    </div>
                    
                    <div class="order-total">
                        <span>Total</span>
                        <span class="total-price">${{ number_format($total, 2) }}</span>
                    </div>
                    
                    <div class="secure-checkout">
                        <i class="fas fa-lock"></i> Secure SSL Encrypted Checkout
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Complete Order</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Payment method selection
        const paymentOptions = document.querySelectorAll('.payment-option');
        const paymentMethodField = document.getElementById('payment_method');
        
        paymentOptions.forEach(option => {
            option.addEventListener('click', () => {
                paymentOptions.forEach(o => o.classList.remove('active'));
                option.classList.add('active');
                paymentMethodField.value = option.getAttribute('data-value');
            });
        });
    </script>
</body>
</html>