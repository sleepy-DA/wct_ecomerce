<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --baby-blue: #89CFF0;
            --pink: #FFB6C1;
            --light-pink: #ffd1dc;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            height: 100vh;
            background: linear-gradient(to bottom, var(--baby-blue), #ffffff);
            padding: 20px;
            color: white;
            box-shadow: 3px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar a {
            color: #333;
            display: block;
            margin: 15px 0;
            padding: 10px 15px;
            font-weight: 500;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background-color: var(--pink);
            color: white;
        }

        .sidebar a.active {
            background-color: var(--pink);
            color: white;
        }

        .sidebar h4 {
            color: #333;
            border-bottom: 2px solid var(--pink);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .content {
            padding: 25px;
            background-color: #f8f9fa;
        }
        
        .stat-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            border: none;
            height: 100%;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .card-title {
            font-size: 1rem;
            color: #6c757d;
        }
        
        .card-text {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }
        
        .bg-pink { background-color: var(--pink); }
        .bg-baby-blue { background-color: var(--baby-blue); }
        .bg-light-pink { background-color: var(--light-pink); }
        
        .recent-orders {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            padding: 20px;
            margin-top: 25px;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-completed { background-color: #d4edda; color: #155724; }
        .status-shipped { background-color: #cce5ff; color: #004085; }
        .status-pending { background-color: #fff3cd; color: #856404; }
        
        .top-products {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            padding: 20px;
            margin-top: 25px;
        }
        
        .product-card {
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .product-img {
            height: 120px;
            object-fit: cover;
            background-color: #f8f9fa;
        }
        
        .logout-link {
            margin-top: 30px;
            background-color: #f8f9fa;
            color: #dc3545 !important;
        }
        
        .logout-link:hover {
            background-color: #dc3545 !important;
            color: white !important;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <h4>Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('orders.index') }}">Orders</a>
        <a href="{{ route('customers.index') }}">Customers</a>
        <a href="{{ route('admin.reviews.index') }}">Reviews</a>
        <a href="{{ route('admin.reports.index') }}">Reports</a>
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="logout-link">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <div class="content w-100">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Welcome, Admin!</h2>
            <span class="text-muted">{{ now()->format('l, F j, Y') }}</span>
        </div>
        <p>Here's a quick overview of your store:</p>
        
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>