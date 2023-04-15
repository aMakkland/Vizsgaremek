<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Products;

class ProductController extends Controller
{
    public function Index()
    {
        return view('admin.all_products');
    }

    public function Add_Product()
    {
        $categories = Category::latest()->get(); 
        $subcategories = Subcategory::latest()->get();

        return view('admin.add_product', compact('categories', 'subcategories'));
    }
}
