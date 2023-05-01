<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function Category_Page()
    {
        return view('user_template.category_page');
    }

    public function Single_Product()
    {
        return view('user_template.single_product');
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
