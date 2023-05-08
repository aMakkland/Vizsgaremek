<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Cart;
use App\Models\ShippingInfo;
use Illuminate\Support\Facades\Auth;

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
        return view('user_template.single_product', compact('product','related_products' ));
    }

    public function Add_To_Cart()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id',$user_id)->get();
        return view('user_template.add_to_cart', compact ('cart_items'));
    }

    public function Add_To_Product_Cart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price
        ]);

        return redirect()->route('add_to_cart')->with('message', 'Your item added successfully!');
    }

    public function Remove_Cart_Item ($id)
    {
        Cart::findOrFail($id)->delete();

        return redirect()->route('add_to_cart')->with('message', 'Your item removed successfully!');
    }

    public function Shipping_Adress()
    {
        return view('user_template.shipping_address');
    }

    public function Add_Shipping_Address(Request $request)
    {
        ShippingInfo::insert
        ([
            'user_id' => Auth::id(),
            'phone_number' =>$request->phone_number,
            'city_name' =>$request->city_name,
            'postal_code' =>$request->postal_code,
        ]);

        
        return redirect()->route('checkout');
    }
    
    public function Checkout()
    {
        return view('user_template.checkout');
    }

    public function User_Profile()
    {
        return view('user_template.user_profile');
    }

    public function Pending_Orders()
    {
        return view('user_template.pending_orders');
    }

    public function History()
    {
        return view('user_template.history');
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
