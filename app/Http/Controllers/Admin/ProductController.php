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
        $products = Products::latest()->get();
        return view('admin.all_products', compact('products'));
    }

    public function Add_Product()
    {
        $categories = Category::latest()->get(); 
        $subcategories = Subcategory::latest()->get();

        return view('admin.add_product', compact('categories', 'subcategories'));
    }
    
    public function Store_Product(Request $request)
    {
        $request->validate([
        'product_name' => 'required|unique:products',
        'price' => 'required',
        'quantity' => 'required',
        'product_short_desc' => 'required',
        'product_long_desc' => 'required',
        'product_category_id' => 'required',
        'product_subcategory_id' => 'required',
        'product_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ]);

    $image = $request->file('product_img');
    $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    $request->product_img->move(public_path('upload'), $img_name);
    $img_url = 'upload/' . $img_name;

    $category_id = $request->product_category_id;
    $subcategory_id = $request->product_subcategory_id;

    $category_name = Category::where('id', $category_id)->value('category_name');
    $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

 
    Products::insert([
        'product_name' => $request->product_name,
        'product_short_desc' => $request->product_short_desc,
        'product_long_desc' => $request->product_long_desc,
        'price' => $request->price,
        'product_category_name' => $category_name,
        'product_subcategory_name' => $subcategory_name,
        'product_category_id' => $request->product_category_id,
        'product_subcategory_id' => $request->product_subcategory_id,
        'product_img' => $img_url,
        'quantity' => $request->quantity,
        'slug' => strtolower(str_replace(' ','-',$request->product_name)),
      
    ]);
    Category::where('id', $category_id)->increment('product_count', 1);
    Subcategory::where('id', $subcategory_id)->increment('product_count', 1);
    
    return redirect()->route('all_products')->with('message', 'Product Added Successfully!');
    }

}