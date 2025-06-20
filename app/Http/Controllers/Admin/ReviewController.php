<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
{
    $reviews = Review::with(['product', 'user'])
                ->orderBy('created_at', 'desc')
                ->get();
                
    return view('admin.reviews.index', compact('reviews'));
}
}