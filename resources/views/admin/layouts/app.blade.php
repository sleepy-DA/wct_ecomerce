<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        /* Reset & base */
        body, html {
            margin: 0; padding: 0; height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
        }
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #343a40, #212529);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding-top: 2rem;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 8px rgba(0,0,0,0.15);
            z-index: 10;
        }
        .sidebar h4 {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 2rem;
            text-align: center;
            letter-spacing: 2px;
            text-transform: uppercase;
            user-select: none;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            color: #cfd8dc;
            padding: 0.85rem 1.8rem;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
            gap: 0.75rem;
        }
        .sidebar a i {
            width: 20px;
            text-align: center;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            color: #fff;
            border-left: 4px solid #ff6f91;
            text-decoration: none;
        }

        /* Content */
        .content {
            flex: 1;
            background: #fff;
            padding: 1.8rem 2.5rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        /* Top header inside content */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 1px solid #ddd;
            padding-bottom: 0.5rem;
        }
        .content-header h1 {
            font-size: 1.8rem;
            color: #343a40;
            font-weight: 700;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            color: #6c757d;
            user-select: none;
        }
        .user-info i {
            color: #ff6f91;
        }

        /* Scrollbar styling for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #6c757d;
            border-radius: 3px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Stat card improvement */
        .stat-card {
            border-radius: 12px;
            color: #333;
            box-shadow: 0 4px 10px rgba(0,0,0,0.07);
            background-color: #fff;
            padding: 1.2rem 1.5rem;
            margin-bottom: 1.5rem;
            transition: transform 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.12);
        }

        /* Status badges */
        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            user-select: none;
            display: inline-block;
            white-space: nowrap;
        }
        .status-completed { background-color: #28a745; color: #fff; }
        .status-shipped { background-color: #17a2b8; color: #fff; }
        .status-pending { background-color: #ffc107; color: #212529; }

        /* Product card */
        .product-card {
            background: white;
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
            transition: box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .product-card:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .product-img {
            max-height: 120px;
            object-fit: contain;
            width: 100%;
            margin-bottom: 1rem;
            user-select: none;
        }
        .form-control:focus, .form-select:focus {
    border-color: #ff6f91;
    box-shadow: 0 0 0 0.25rem rgba(255, 111, 145, 0.25);
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #218838);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #007bff, #0069d9);
    border: none;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    font-weight: 600;
    padding: 1rem 1.5rem;
}

    </style>
</head>
<body>

    <nav class="sidebar">
    <h4>Admin Panel</h4>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
    </a>
    {{-- FIXED PRODUCTS LINK --}}
    <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <i class="fa-solid fa-box-open"></i> Products
    </a>
    {{-- FIXED ORDERS LINK --}}
    <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
        <i class="fa-solid fa-truck"></i> Orders
    </a>
    {{-- FIXED CUSTOMERS LINK --}}
    <a href="{{ route('admin.customers.index') }}" class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
        <i class="fa-solid fa-users"></i> Customers
    </a>
    <a href="{{ route('admin.reviews.index') }}" class="{{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
        <i class="fa-solid fa-star"></i> Reviews
    </a>
    <a href="{{ route('admin.reports.index') }}" class="{{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
        <i class="fa-solid fa-chart-line"></i> Reports
    </a>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>

    <main class="content">
        <div class="content-header">
            <h1>@yield('title', 'Dashboard')</h1>
            <div class="user-info">
                <i class="fa-solid fa-user"></i> {{ auth()->user()->name ?? 'Admin' }}
            </div>
        </div>

        @yield('content')
    </main>

    @stack('scripts')

</body>
</html>