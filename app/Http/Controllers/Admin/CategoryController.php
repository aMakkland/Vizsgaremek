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

    public function AddCategory()
    {
        return view('admin.add_category');
    }
}
