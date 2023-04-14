<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index()
    {
        return view('admin.all_subcategory');
    }
    public function Add_SubCategory()
    {
        return view('admin.add_subcategory');
    }
}
