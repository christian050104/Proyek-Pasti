@extends('customer.layouts.navbar')
@section('content')
<section class="home-slider owl-carousel js-fullheight">
    <div class="slider-item js-fullheight"
        style="background-image: url({{ asset('appetizer-master/images/bg_1.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text js-fullheight justify-content-center align-items-center"
                data-scrollax-parent="true">

                <div class="col-md-12 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-4 mt-5">Our Delicious Specialties</h1>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item js-fullheight"
        style="background-image: url({{ asset('appetizer-master/images/bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text js-fullheight justify-content-center align-items-center"
                data-scrollax-parent="true">

                <div class="col-md-12 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-4 mt-5">The Best Place to Kick of Your Day</h1>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item js-fullheight"
        style="background-image: url({{ asset('appetizer-master/images/bg_3.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-12 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-4 mt-5">Creamy Hot and Ready to Serve</h1>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="container mt-5">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset($product['image']) }}" class="card-img-top" alt="{{ $product['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text">{{ $product['description'] }}</p>
                    <p class="card-text">Price: Rp {{ $product['price'] }}</p>
                    <p class="card-text">Stock: {{ $product['stock'] }}</p>
                    <!-- Tambahkan tombol "View Detail" -->
                    <a href="#" class="btn btn-primary">View Detail</a>
                    <a href="{{ route('customer.carts.index') }}" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
