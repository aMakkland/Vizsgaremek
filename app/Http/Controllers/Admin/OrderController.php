<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function Index()
    {
        $pending_orders = Order::where('status','pending')->latest()->get();
        return view('admin.pending_orders', compact ('pending_orders'));
    }

    
}
