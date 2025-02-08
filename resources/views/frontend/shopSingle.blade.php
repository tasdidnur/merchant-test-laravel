@extends('frontend.layout.app')
@section('content')
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title mt-3">
      <h2>{{ $store->name }}</h2>
    </div>

    @foreach ($categories as $category)
    <div class="row mb-5">
        <h2 class="text-danger text-center mb-3">{{ $category->name ?? null }}</h2>
        @php
            $products = App\Models\Product::where('category_id', $category->id)->get();
        @endphp
        @foreach ($products as $product)  
        <div class="col-lg-4 col-md-4 d-flex">
            <div class="icon-box iconbox-blue">
                <h2 class="text-danger text-center mb-2">{{ $product->name ?? null }}</h2>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach

  </div>
</section><!-- End Sevices Section -->
@endsection