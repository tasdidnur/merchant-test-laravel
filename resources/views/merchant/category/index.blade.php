@extends('layout.app')
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Category List</h3>
        <ul>
            <li>
                <a href="">Merchant</a>
            </li>
            <li>All Categories</li>
        </ul>
        @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Fees Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <a class="btn-fill-lmd text-light gradient-dodger-blue" href="{{ route('merchant.category.create') }}">Add New Category</a>
            </div>
            <div class="table-responsive">
                <table class="table data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Store Name</th>
                            {{-- <th class="text-center">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name ?? null }}</td>
                                <td>{{ $category->store->name ?? null }}</td>
                                {{-- <td class="text-center">
                                    <div class="d-flex">
                                        <a class="dropdown-item text-success p-0" href="#">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a class="dropdown-item text-danger p-0" href="#">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $patients->links() }} --}}
                {{ $categories->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
    <!-- Fees Table Area End Here -->
@endsection
