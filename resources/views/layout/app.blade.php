<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>laravel Test</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img') }}/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('backend/fonts') }}/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/select2.min.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/datepicker.min.css">
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/dropzone.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/style.css">
    <!-- Modernize js -->
    <script src="{{ asset('backend/js') }}/modernizr-3.6.0.min.js"></script>

</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        @include('layout.header')
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Page Area Start Here -->
            <div class="dashboard-page-one">
                <!-- Sidebar Area Start Here -->
                <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
                <div class="mobile-sidebar-header d-md-none">
                        <div class="header-logo">
                            <a href="index.html"><img src="img/logo1.png" alt="logo"></a>
                        </div>
                </div>
                    <div class="sidebar-menu-content">
                        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                            <li class="nav-item">
                                <a href="{{ isset(auth()->user()->role) && auth()->user()->role == 1 ? route('admin.dashboard') : route('merchant.dashboard') }}" class="nav-link">
                                    <i class="flaticon-dashboard"></i><span>Dashboard</span>
                                </a>
                            </li>
                            @if (auth()->user()->role == 2)
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Stores</span></a>
                                <ul class="nav sub-group-menu {{ Request::routeIs('merchant.store.list') || Request::routeIs('merchant.store.create') ? 'sub-group-active' : '' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('merchant.store.list') }}" class="nav-link {{ Request::routeIs('merchant.store.list') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Store list</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('merchant.store.create') }}" class="nav-link {{ Request::routeIs('merchant.store.create') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Create Store</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i
                                        class="flaticon-menu-1"></i><span>Categories</span></a>
                                <ul class="nav sub-group-menu {{ Request::routeIs('merchant.category.list') || Request::routeIs('merchant.category.create') ? 'sub-group-active' : '' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('merchant.category.list') }}" class="nav-link {{ Request::routeIs('merchant.category.list') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Category List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('merchant.category.create') }}" class="nav-link {{ Request::routeIs('merchant.category.create') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Create Category</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Products</span></a>
                                <ul class="nav sub-group-menu {{ Request::routeIs('merchant.product.list') || Request::routeIs('merchant.product.create') ? 'sub-group-active' : '' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('merchant.product.list') }}" class="nav-link {{ Request::routeIs('merchant.product.list') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Product List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('merchant.product.create') }}" class="nav-link {{ Request::routeIs('merchant.product.create') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Create Product</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="all-subject.html" class="nav-link"><i
                                        class="flaticon-open-book"></i><span>Subject</span></a>
                            </li> --}}
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Sidebar Area End Here -->
                <div class="dashboard-content-one">
                    @yield('content')
                    <!-- Footer Area Start Here -->
                    {{-- @include('layouts.footer') --}}
                    <!-- Footer Area End Here -->
                </div>
            </div>
            <!-- Page Area End Here -->
        </div>
    <!-- jquery-->
    <script src="{{ asset('backend/js') }}/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="{{ asset('backend/js') }}/plugins.js"></script>
    <!-- Popper js -->
    <script src="{{ asset('backend/js') }}/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('backend/js') }}/bootstrap.min.js"></script>
    <!-- Counterup Js -->
    <script src="{{ asset('backend/js') }}/jquery.counterup.min.js"></script>
    <!-- Moment Js -->
    <script src="{{ asset('backend/js') }}/moment.min.js"></script>
    <!-- Waypoints Js -->
    <script src="{{ asset('backend/js') }}/jquery.waypoints.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('backend/js') }}/jquery.scrollUp.min.js"></script>
    <!-- Full Calender Js -->
    <script src="{{ asset('backend/js') }}/fullcalendar.min.js"></script>
    <!-- Chart Js -->
    <script src="{{ asset('backend/js') }}/Chart.min.js"></script>
    <!-- Select 2 Js -->
    <script src="{{ asset('backend/js') }}/select2.min.js"></script>
    <!-- Date Picker Js -->
    <script src="{{ asset('backend/js') }}/datepicker.min.js"></script>
    <!-- Dropzone Js -->
    <script src="{{ asset('backend/js') }}/dropzone.min.js"></script>
    <!-- Custom Js -->
    <script src="{{ asset('backend/js') }}/main.js"></script>

    @stack('script')

</body>

</html>
