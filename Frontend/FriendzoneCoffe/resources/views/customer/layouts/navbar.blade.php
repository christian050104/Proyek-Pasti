<!DOCTYPE html>
<html lang="en">

<head>
    <title>FriendzoneCafe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Miss+Fajardose&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('appetizer-master/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('appetizer-master/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('appetizer-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('appetizer-master/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('appetizer-master/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('appetizer-master/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('appetizer-master/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('appetizer-master/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('appetizer-master/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('appetizer-master/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('appetizer-master/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('appetizer-master/css/style.css') }}">


</head>

<body>
    <div class="py-1 bg-black top">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">+ 1235 2355 98</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">youremail@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                            <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span>
                                <span>8:00AM - 9:00PM</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">FriendzoneCafe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                        <a href="{{ route('customer.products.index') }}" class="nav-link">Product</a>
                    </li>
                    <li class="nav-item {{ request()->is('menu') ? 'active' : '' }}">
                        <a href="{{ route('customer.carts.index') }}" class="nav-link">Cart</a>
                    </li>
                   
                    <li class="nav-item {{ request()->is('reservation') ? 'active' : '' }}">
                        <a href="{{ route('customer.mejas.index') }}" class="nav-link">Meja</a>
                    </li>
                   
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                    <li class="nav-item {{ request()->is('reservation') ? 'active' : '' }}">
                        <a href="" class="nav-link">Book a table</a>
                    </li>
                    
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="bi bi-cart2"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if (Auth::check() && Auth::user()->profile_image)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" class="rounded-circle"
                                        width="30" height="30" alt="">
                                @else
                                    <img src="{{ asset('path/to/default/image.jpg') }}" class="rounded-circle"
                                        width="30" height="30" alt="Default Image">
                                @endif
                                <span class="username text-dark">{{ Auth::check() ? Auth::user()->name : '' }}</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li> <a class="nav-link" href="/profile" style="color: black;">Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>


                        </li>
                   
                   
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <div class="content">
        @yield('content')
    </div>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container-fluid px-md-5 px-3">
            <div class="row mb-5">
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Friendzone Cafe</h2>
                        <p>"Cafe Friendzone: Terletak di tengah hamparan kata-kata, jauh dari negeri Vokalia dan Consonantia, tempat di mana kata-kata 'teman' mungkin lebih dari sekadar kata. Rasakan kehangatan kopi dan suasana yang ramah di sini."</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Open Hours</h2>
                        <ul class="list-unstyled open-hours">
                            <li class="d-flex"><span>Monday</span><span>09:00 - 23:00</span></li>
                            <li class="d-flex"><span>Tuesday</span><span>09:00 - 23:00</span></li>
                            <li class="d-flex"><span>Wednesday</span><span>09:00 - 23:00</span></li>
                            <li class="d-flex"><span>Thursday</span><span>09:00 - 23:00</span></li>
                            <li class="d-flex"><span>Friday</span><span>09:00 - 01:00</span></li>
                            <li class="d-flex"><span>Saturday</span><span>09:00 - 01:00</span></li>
                            <li class="d-flex"><span>Sunday</span><span>09:00 - 24:00</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Newsletter</h2>
                        <p>Far far away, behind the word mountains, far from the countries.</p>
                        <form action="#" class="subscribe-form">
                            <div class="form-group">
                                <input type="text" class="form-control mb-2 text-center"
                                    placeholder="Enter email address">
                                <input type="submit" value="Subscribe" class="form-control submit px-3">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Instagram</h2>
                        <div class="thumb d-sm-flex">
                            <a href="#" class="thumb-menu img"
                                style="background-image: url({{ asset('appetizer-master/images/insta-1.jpg') }});">
                            </a>
                            <a href="#" class="thumb-menu img"
                                style="background-image: url({{ asset('appetizer-master/images/insta-2.jpg') }});">
                            </a>
                            <a href="#" class="thumb-menu img"
                                style="background-image: url({{ asset('appetizer-master/images/insta-3.jpg') }});">
                            </a>
                        </div>
                        <div class="thumb d-flex">
                            <a href="#" class="thumb-menu img"
                                style="background-image: url({{ asset('appetizer-master/images/insta-4.jpg') }});">
                            </a>
                            <a href="#" class="thumb-menu img"
                                style="background-image: url({{ asset('appetizer-master/images/insta-5.jpg') }});">
                            </a>
                            <a href="#" class="thumb-menu img"
                                style="background-image: url({{ asset('appetizer-master/images/insta-6.jpg') }});">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This website is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">JHON</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('appetizer-master/js/jquery.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/popper.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/aos.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('appetizer-master/js/google-map.js') }}"></script>
    <script src="{{ asset('appetizer-master/js/main.js') }}"></script>
