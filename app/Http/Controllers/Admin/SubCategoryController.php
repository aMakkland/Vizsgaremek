<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index()
    {
        $all_subcategories = SubCategory::latest()->get();
        return view('admin.all_subcategory', compact('all_subcategories'));
    }

    public function Add_SubCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.add_subcategory', compact('categories'));
    }

    public function Store_SubCategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);

        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');

        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace('','-',$request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name,
            
        ]);

        Category::where('id', $category_id)->increment('sub_category_count',1);

        return redirect()->route('all_subcategory')->with('message','Sub Category Added Successfully!');
    }
}
