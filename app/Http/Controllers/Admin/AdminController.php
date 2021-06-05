<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function categories()
    {
        $countCategories = Category::count();
        return $countCategories;
    }
    public function products()
    {
        $countProducts = Product::count();
        return $countProducts;
    }
    public function getGategories()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function addProduct()
    {
        return view('admin.Produit');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function contact()
    {
        return view('admin.contact');
    }
}
