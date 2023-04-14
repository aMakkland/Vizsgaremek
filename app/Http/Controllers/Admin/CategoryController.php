<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.all_category', compact('categories'));
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

    public function Edit_Category($id)
    {
        $category_info = Category::findOrFail($id);

            return view('admin.edit_category', compact('category_info'));
    }

    public function Update_Category(Request $request)
    {
        $category_id = $request->category_id;


        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace('','-',$request->category_name))
        ]);
        return redirect()->route('all_category')->with('message','Category Updated Successfully');
    }
    
}
