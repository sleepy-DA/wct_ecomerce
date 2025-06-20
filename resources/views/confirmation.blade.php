<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Natural Skincare</title>
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

        .confirmation-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .success-icon {
            font-size: 4rem;
            color: #48bb78;
            margin-bottom: 20px;
        }

        .confirmation-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .confirmation-details {
            background: var(--light-gray);
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
            text-align: left;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--medium-gray);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 500;
        }

        .detail-value {
            color: var(--text-gray);
        }

        .order-id {
            color: var(--pink);
            font-weight: 600;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            margin-top: 10px;
        }

        .btn-primary {
            background: var(--pink);
            color: white;
        }

        .btn-primary:hover {
            background: #ff5a9a;
        }

        @media (max-width: 767px) {
            .confirmation-container {
                padding: 20px;
                margin: 20px;
            }
            
            .confirmation-title {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <h1 class="confirmation-title">Order Confirmed!</h1>
        <p>Thank you for your purchase. Your order has been placed successfully.</p>
        <p>A confirmation email has been sent to <strong>{{ $order->email }}</strong></p>
        
        <div class="confirmation-details">
            <div class="detail-row">
                <span class="detail-label">Order Number:</span>
                <span class="detail-value order-id">#{{ $order->id }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Order Date:</span>
                <span class="detail-value">{{ $order->created_at->format('F j, Y \a\t g:i a') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Customer:</span>
                <span class="detail-value">{{ $order->first_name }} {{ $order->last_name }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Shipping To:</span>
                <span class="detail-value">{{ $order->address }}, {{ $order->city }}, {{ $order->country }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Payment Method:</span>
                <span class="detail-value">{{ ucfirst($order->payment_method) }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Shipping Method:</span>
                <span class="detail-value">{{ $order->shipping_method }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Amount:</span>
                <span class="detail-value">${{ number_format($order->total, 2) }}</span>
            </div>
        </div>
        
        <p>We'll send you shipping confirmation when your order is on its way!</p>
        
        <div class="action-buttons">
            <a href="{{ route('shop.index') }}" class="btn btn-primary">Continue Shopping</a>
            <a href="{{ route('home') }}" class="btn" style="background: var(--medium-gray); margin-left: 10px;">Back to Home</a>
        </div>
    </div>
</body>
</html>