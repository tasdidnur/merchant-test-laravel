<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // category list
    public function category_list()
    {
        $categories= Category::paginate(10);
        return view('merchant.category.index' , compact('categories'));
    }

    // create category
    public function category_create()
    {
        $stores = Store::all();
        return view('merchant.category.create', compact('stores'));
    }

    // insert category
    public function category_insert(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'store_id' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('merchant.category.list')
            ->with('success', 'Category created successfully.');
    }
}
