<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(10);
        return view('frontend.index', compact('stores'));
    }

    public function merchant_register()
    {
        return view('frontend.merchant');
    }

    public function merchant_insert(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'shop_name' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->shop_name = $request->shop_name;
        $user->password = Hash::make($request->password);
        $user->role = '2';
        $user->save();

        return redirect()->back()->with('success', 'Merchant registered successfully');
    }

    public function shop_single($shop)
    {
        $store = Store::where('slug', $shop)->first();
        $categories = Category::where('store_id', $store->id)->get();
        return view('frontend.shopSingle', compact('store', 'categories'));
    }
}
