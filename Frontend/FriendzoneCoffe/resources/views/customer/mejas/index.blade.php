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
    <h1 class="text-center mb-5">Meja FRIENDZONE</h1>
    <div class="row">
        @foreach ($mejas as $meja)
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $meja['gambar'] }}" class="img-fluid rounded-start" alt="Meja Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $meja['nama'] }}</h5>
                            <p class="card-text">{{ $meja['deskripsi'] }}</p>
                            <p class="card-text"><small class="text-muted">Status: {{ $meja['status'] }}</small></p>
                            <!-- Tambahkan tombol "Pesan" -->
                            <form action="#" method="POST">
                                @csrf
                                <input type="hidden" name="meja_id" value="{{ $meja['ID'] }}">
                                <button type="submit" class="btn btn-primary">Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection