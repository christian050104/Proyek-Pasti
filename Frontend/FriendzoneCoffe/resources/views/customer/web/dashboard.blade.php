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


    <section class="ftco-section ftco-wrap-about ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 wrap-about ftco-animate text-center">
                    <div class="heading-section mb-4 text-center">
                        <span class="subheading">About</span>
                        <h2 class="mb-4">Friendzone Cafe</h2>
                    </div>
                    <p>"Dalam perjalanan kami menuju eksistensi yang lebih modern, Cafe Friendzone menetapkan standar baru untuk pengalaman bersantap yang menyenangkan. Kami menghadirkan dua pendekatan yang unik: yang pertama, para tamu dapat datang langsung ke Cafe Friendzone untuk menikmati hidangan dan meja yang mereka inginkan; yang kedua, kami memberikan kemudahan dengan sistem pemesanan melalui WhatsApp untuk para tamu yang lebih suka merencanakan kedatangan mereka terlebih dahulu. Namun, kami sadar bahwa tantangan dalam mengelola antrian dan menyediakan informasi yang cukup kepada pelanggan merupakan hal penting yang perlu kita selesaikan. Oleh karena itu, kami berkomitmen untuk memperkenalkan website resmi kami sebagai solusi, yang tidak hanya memudahkan pemesanan, tetapi juga memberikan informasi yang lengkap tentang menu kami dan lokasi Cafe Friendzone. Bergabunglah dengan kami dalam petualangan menyajikan pengalaman bersantap yang tak terlupakan di Cafe Friendzone!"</p>

                    <div class="video justify-content-center">
                        <a href="https://vimeo.com/45830194"
                            class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                            <span class="ion-ios-play"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url({{ asset('appetizer-master/images/bg_4.jpg') }});" data-stellar-background-ratio="0.5">
        <!-- <section class="ftco-section ftco-counter img ftco-no-pt" id="section-counter"> -->
        <div class="container">
            <div class="row d-md-flex align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="row d-md-flex align-items-center">
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="18">0</strong>
                                    <span>Years of Experienced</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="15000">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Menus</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="20">0</strong>
                                    <span>Staffs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Chef</span>
                    <h2 class="mb-4">Our Master Chef</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img"
                            style="background-image: url({{ asset('appetizer-master/images/chef-4.jpg') }});"></div>
                        <div class="text pt-4">
                            <h3>John Smooth</h3>
                            <span class="position mb-2">Restaurant Owner</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <div class="faded">
                                <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img"
                            style="background-image: url({{ asset('appetizer-master/images/chef-2.jpg') }});"></div>
                        <div class="text pt-4">
                            <h3>Rebeca Welson</h3>
                            <span class="position mb-2">Head Chef</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <div class="faded">
                                <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img"
                            style="background-image: url({{ asset('appetizer-master/images/chef-3.jpg') }});"></div>
                        <div class="text pt-4">
                            <h3>Kharl Branyt</h3>
                            <span class="position mb-2">Chef</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <div class="faded">
                                <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img"
                            style="background-image: url({{ asset('appetizer-master/images/chef-1.jpg') }});"></div>
                        <div class="text pt-4">
                            <h3>Luke Simon</h3>
                            <span class="position mb-2">Chef</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <div class="faded">
                                <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="ftco-section testimony-section" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5"> -->
    <section class="ftco-section testimony-section img"
        style="background-image: url({{ asset('appetizer-master/images/bg_5.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Happy Customer</h2>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('appetizer-master/images/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Jason McClean</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('appetizer-master/images/person_2.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Stevenson</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('appetizer-master/images/person_3.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Art Leonard</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('appetizer-master/images/person_4.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Rose Henderson</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('appetizer-master/images/person_3.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Ian Boner</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   
    <section class="ftco-section">
        <div class="container-fluid px-4">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Specialties</span>
                    <h2 class="mb-4">Our Menu</h2>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-6 col-lg-4 menu-wrap">
                        <div class="heading-menu text-center ftco-animate">
                            <h3></h3>
                        </div>
                            <div class="menus d-flex ftco-animate">
                                <div class="menu-img img" style="background-image: url();">
                                </div>
                                <div class="text">
                                    <div class="d-flex">
                                        <div class="one-half">
                                            <h3></h3>
                                        </div>
                                        <div class="one-forth">
                                            <span class="price">Rp</span>
                                        </div>
                                    </div>
                                    <p><span></span></p>
                                    <!-- Tambahkan tombol "View Detail" dan "Add to Cart" -->
                                    <div class="d-flex justify-content-between">
                                        <a href=""
                                            class="btn btn-primary">View Detail</a>
                                        @auth
                                            <form action="" method="POST">
                                                @csrf
                                                <input type="hidden" name="menu_id" value="">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-success">Add to Cart</button>
                                            </form>
                                        @else
                                            <a href="" class="btn btn-success">Add to Cart</a>
                                        @endauth
                                    </div>

                                </div>
                            </div>
                    </div>
            </div>

        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
                    <div class="py-md-5">
                        <div class="heading-section ftco-animate mb-5">
                            <span class="subheading">Book a table</span>
                            <h2 class="mb-4">Make Reservation</h2>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="time">Time</label>
                                        <input type="time" class="form-control" id="time" name="time"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number_of_persons">Number of Persons</label>
                                        <select name="number_of_persons" id="number_of_persons" class="form-control"
                                            required>
                                            <option value="">Select Number of Persons</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4+">4+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary py-3 px-5">Make a
                                            Reservation</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('appetizer-master/images/insta-1.jpg') }});">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('appetizer-master/images/insta-2.jpg') }});">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('appetizer-master/images/insta-1.jpg') }});">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('appetizer-master/images/insta-4.jpg') }});">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('appetizer-master/images/insta-5.jpg') }});">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
