@extends('frontend.layout.app')
@section('content')
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title mt-3">
      <h1>WELCOME</h1>
      <h2>Shop Page</h2>
    </div>

    <div class="row">
      @foreach ($stores as $store)
      <div class="col-lg-3 col-md-3 d-flex">
        <a href="{{ route('shop.single', ['shop' => $store->slug]) }}" target="_blank">
          <div class="icon-box iconbox-blue">
            <h2>{{ $store->name ?? null }}</h2>
            <p>Click To visit {{ $store->name ?? null }} Page</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Sevices Section -->
@endsection