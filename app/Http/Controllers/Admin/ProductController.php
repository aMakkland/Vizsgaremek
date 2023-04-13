<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {
        return view('admin.all_products');
    }
    public function Add_Product()
    {
        return view('admin.add_product');
    }
}
