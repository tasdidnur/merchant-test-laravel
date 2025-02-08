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
            <form action="{{ route('merchant.product.insert') }}" method="POST" class="new-added-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Select Store *</label>
                        <select class="select2" name="store_id" id="storeSelect" required>
                            <option value="">Please Select Store</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Select category *</label>
                        <select class="select2" name="category_id" id="categorySelect">
                        </select>
                        @error('category_id')
                            <div class="text-red text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Product Name *</label>
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
    @push('script')
    <script>
        $(document).ready(function() {
            $('#storeSelect').on('change', function() {
                var storeId = $(this).val();console.log(storeId);

                if (storeId) {
                    $.ajax({
                        url: "{{ route('merchant.get.categories') }}",
                        type: "GET",
                        data: { store_id: storeId },
                        success: function(response) {
                            $('#categorySelect').empty();
                            $('#categorySelect').append('<option value="">Please Select Category</option>');
                            
                            $.each(response, function(key, category) {
                                $('#categorySelect').append('<option value="' + category.id + '">' + category.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#categorySelect').empty();
                    $('#categorySelect').append('<option value="">Please Select Category</option>');
                }
            });
        });
    </script>
    @endpush
@endsection
