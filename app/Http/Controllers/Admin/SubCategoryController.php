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

        Category::where('id', $category_id)->increment('subcategory_count',1);

        return redirect()->route('all_subcategory')->with('message','Sub Category Added Successfully!');
    }
    public function Edit_SubCategory($id)
    {
        $subcatinfo = SubCategory::findOrFail($id);

        return view('admin.edit_subcategory', compact('subcatinfo'));
    }

    public function Update_SubCategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
        ]);

        $subcatid = $request->subcatid;

        Subcategory::findOrFail($subcatid)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace('','-',$request->subcategory_name)),
        ]);

        return redirect()->route('all_subcategory')->with('message','Sub Category Updated Successfully!');
    }

    public function Delete_SubCategory($id)
    {
        $cat_id = SubCategory::where('id',$id)->value('category_id');
        Subcategory::findOrFail($id)->delete();
        Category::where('id',$cat_id)->decrement('subcategory_count',1);
    
    return redirect()->route('all_subcategory')->with('message','Sub Category Deleted Successfully!');
    }
}
