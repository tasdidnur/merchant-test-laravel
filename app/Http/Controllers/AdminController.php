<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $merchants = User::where('role', 2)->paginate(10);
        $merchant_total = User::where('role', 2)->count();
        $store_total = Store::count();
        $category_total = Category::count();
        $product_total = Product::count();
        return view('admin.home',compact('merchants','merchant_total','store_total','category_total','product_total'));
    }
}
