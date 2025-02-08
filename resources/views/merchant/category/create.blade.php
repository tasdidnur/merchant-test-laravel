@extends('layout.app')

@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Create New Category</h3>
        <ul>
            <li>
                <a href="">Merchant</a>
            </li>
            <li>Create Category</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <form action="{{ route('merchant.category.insert') }}" method="POST" class="new-added-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Select Store *</label>
                        <select class="select2" name="store_id">
                            <option value="">Please Select Store</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                        @error('store_id')
                            <div class="text-red text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Category Name *</label>
                        <input value="{{old('name')}}" type="text" placeholder=""
                            class="form-control @error('name')
                        border-red
                    @enderror"
                            name="name">
                        @error('name')
                            <div class="text-red text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 form-group mg-t-8 text-left">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Admit Form Area End Here -->
@endsection
