@extends('layout.app')

@section('content')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Admin Dashboard</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Admin</li>
    </ul>
</div>
<!-- Breadcubs Area End Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table data-table text-nowrap">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Merchant Name</th>
                        <th>Merchant Email</th>
                        {{-- <th class="text-center">Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merchants as $merchant)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $merchant->name ?? null }}</td>
                            <td>{{ $merchant->email ?? null }}</td>
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
            {{ $merchants->appends(request()->query())->links() }}
        </div>
    </div>
</div>
<!-- Social Media Start Here -->
<div class="row gutters-20">
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card dashboard-card-seven">
            <div class="social-media bg-fb hover-fb">
                <div class="media media-none--lg">
                    <div class="media-body space-sm">
                        <h6 class="item-title">Merchants</h6>
                    </div>
                </div>
                <div class="social-like">{{ $merchant_total ?? null }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card dashboard-card-seven">
            <div class="social-media bg-twitter hover-twitter">
                <div class="media media-none--lg">
                        <div class="media-body space-sm">
                            <h6 class="item-title">Stores</h6>
                        </div>
                </div>
                <div class="social-like">{{ $store_total ?? null }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card dashboard-card-seven">
            <div class="social-media bg-gplus hover-gplus">
                <div class="media media-none--lg">
                    <div class="media-body space-sm">
                        <h6 class="item-title">Categories</h6>
                    </div>
                </div>
                <div class="social-like">{{ $category_total ?? null }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card dashboard-card-seven">
            <div class="social-media bg-linkedin hover-linked">
                <div class="media media-none--lg">
                    <div class="media-body space-sm">
                        <h6 class="item-title">Products</h6>
                    </div>
                </div>
                <div class="social-like">{{ $product_total ?? null }}</div>
            </div>
        </div>
    </div>
</div>
<!-- Information End Here -->
@endsection