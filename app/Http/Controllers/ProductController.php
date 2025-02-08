<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // product list
    public function product_list()
    {
        $products = Product::paginate(10);
        return view('merchant.product.index',compact('products'));
    }

    // create product
    public function product_create()
    {
        $stores = Store::all();
        return view('merchant.product.create',compact('stores'));
    }

    // insert product
    public function product_insert(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'category_id' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('merchant.product.list')
            ->with('success', 'Product created successfully.');
    }

    // ajax route
    public function getCategories(Request $request)
    {
        $categories = Category::where('store_id', $request->store_id)->get();
        return response()->json($categories);
    }
}
