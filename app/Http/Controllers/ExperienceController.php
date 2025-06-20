<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'comment' => 'required|string|max:500',
    ]);

    Review::create([
        'user_id' => Auth::id(),
        'type' => 'experience', // Set the type explicitly
        'comment' => $request->comment,
    ]);

    return response()->json(['success' => true]);
}
}