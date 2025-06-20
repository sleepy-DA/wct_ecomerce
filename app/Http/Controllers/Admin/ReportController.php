<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Get monthly income data
        $monthlyIncome = Order::select(
                DB::raw('SUM(total) as income'),
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month")
            )
            ->where('status', 'completed')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Get additional data required by the view
        $totalOrders = Order::count();
        $totalCustomers = User::where('role', 'user')->count();
        $totalIncome = Order::where('status', 'completed')->sum('total');
        $recentOrders = Order::with('user')->latest()->take(10)->get();

        return view('admin.reports.index', compact(
            'monthlyIncome',
            'totalOrders',
            'totalCustomers',
            'totalIncome',
            'recentOrders'
        ));
    }
}