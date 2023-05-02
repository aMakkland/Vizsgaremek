<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class ClientController extends Controller
{
    public function Category_Page($id)
    {
        $category = Category::findOrFail($id);
        $products = Products::where( 'product_category_id', $id)->latest()->get();
        return view('user_template.category_page', compact('category', 'products'));
    }

    public function Single_Product($id)
    {
        $product = Products::findOrFail($id);
        $subcat_id = Products::where('id',$id)->value('product_subcategory_id');
        $related_products = Products::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user_template.product', compact('product', 'related_products'));
    }

    public function Add_To_Cart()
    {
        return view('user_template.add_to_cart');
    }

    public function Checkout()
    {
        return view('user_template.checkout');
    }

    public function User_Profile()
    {
        return view('user_template.user_profile');
    }

    public function New_Relese()
    {
        return view('user_template.new_relese');
    }

    public function Todays_Deal()
    {
        return view('user_template.todays_deal');
    }

    public function Customer_Service()
    {
        return view('user_template.custom_service');
    }
}
