<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        $all_products = Products::latest()->get();
        return view('user_template.home', compact ('all_products'));
    }
}
