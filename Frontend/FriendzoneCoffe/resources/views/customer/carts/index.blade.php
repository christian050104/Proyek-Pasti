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
    <h1>Your Cart</h1>
    <a href="{{ route('customer.products.index') }}" class="btn btn-primary">Continue Shopping</a>
    @if(is_array($carts))
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>{{ $cart['ID'] }}</td>
                        <td>{{ $cart['product_id'] }}</td>
                        <td><img src="{{ $cart['product_image'] }}" width="50" /></td>
                        <td>{{ $cart['product_name'] }}</td>
                        <td>
                            <form action="{{ route('carts.update', $cart['ID']) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $cart['quantity'] }}" min="1" required>
                                <button type="submit" class="btn btn-primary">Update Quantity</button>
                            </form>
                        </td>
                        <td>{{ $cart['price'] }}</td>
                        <td>{{ $cart['total'] }}</td>
                        <td>
                            <form action="{{ route('carts.destroy', $cart['ID']) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No items in cart</p>
    @endif
@endsection
