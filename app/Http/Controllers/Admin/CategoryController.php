<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.all_category');
    }

    public function Add_Category()
    {
        return view('admin.add_category');
    }

    public function Store_Category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace('','-',$request->category_name))
        ]);

        return redirect()->route('all_category')->with('message','Category Added Successfully');
    }
}
