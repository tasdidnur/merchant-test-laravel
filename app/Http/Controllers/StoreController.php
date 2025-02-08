<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // store list
    public function store_list()
    {
        $stores= Store::paginate(10);
        return view('merchant.store.index' , compact('stores'));
    }

    // create store
    public function store_create()
    {
        return view('merchant.store.create');
    }

    // insert store
    public function store_insert(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:stores',
        ]);

        // Store::create($request->all());
        $store = new Store();
        $store->name = $request->name;
        $store->slug = Str::slug($request->name, '_');
        $store->save();

        return redirect()->route('merchant.store.list')
            ->with('success', 'Store created successfully.');
    }
}
