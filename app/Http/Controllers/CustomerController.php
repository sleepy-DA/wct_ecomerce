<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Customer home page after login
    public function index()
    {
        // For now, just return a simple view
        return view('customer.home');
    }
}
