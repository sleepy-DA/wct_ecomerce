<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        // FIX: Use 'role' column instead of non-existent 'is_admin'
        $customerCount = User::where('role', 'user')->count();
        
        $totalIncome = Order::where('status', 'completed')->sum('total');
        
        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();
            
        $topProducts = DB::table('products')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->select(
                'products.id',
                'products.name',
                'products.price',
                'products.image',
                DB::raw('COUNT(order_items.id) as order_count')
            )
            ->groupBy('products.id', 'products.name', 'products.price', 'products.image')
            ->orderByDesc('order_count')
            ->limit(5)
            ->get();

        return view('admin.dashboard', [
            'productCount' => $productCount,
            'orderCount' => $orderCount,
            'customerCount' => $customerCount,
            'totalIncome' => $totalIncome,
            'recentOrders' => $recentOrders,
            'topProducts' => $topProducts
        ]);
    }
}