<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NGC - Next Gen Computex</title>

    {{-- for Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    {{-- For Icon --}}
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('images/icon_w.png') }}">
    {{-- for External Style Sheet --}}
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    {{-- main NGC --}}



</head>

<body>
    <div id="app">

        <div class="header">
            <div class="menu-bar fixed-top shadow-sm">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        NGC <span class="font-italic full">->Next Gen Computex</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">
                                    <i class="fa-solid fa-house-chimney"></i> Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.allProducts') }}">
                                    <i class="fa-solid fa-cube"></i> Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('services') }}">
                                    <i class="fa-solid fa-briefcase"></i> Services
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.index') }}">
                                    <i class="fa-solid fa-cart-shopping"></i> Cart
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('order.show') }}">
                                    <i class="fa-solid fa-box"></i> My Orders
                                </a>
                            </li>
                
                            <div class="d-flex ml-5" role="group" aria-label="Basic example">
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item m-1">
                                            <a class="btn btn-sm bttn btn-outline-dark" role="button" href="{{ route('login') }}">
                                                <i class="fa-solid fa-sign-in-alt"></i> Login
                                            </a>
                                        </li>
                                    @endif
                
                                    @if (Route::has('register'))
                                        <li class="nav-item m-1">
                                            <a class="btn btn-sm bttn btn-outline-dark" role="button" href="{{ route('register') }}">
                                                <i class="fa-solid fa-user-plus"></i> Register
                                            </a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle m-1" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa-solid fa-user"></i> {{ ucfirst(Auth::user()->name) }}
                                        </a>
                
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item btn bttn btn-outline-dark" href="{{ url('/') }}">
                                                <i class="fa-solid fa-tachometer-alt"></i> Dashboard
                                            </a>
                                            <br>
                                            <a class="dropdown-item btn bttn btn-outline-dark" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa-solid fa-sign-out-alt"></i> {{ __('Logout') }}
                                            </a>
                
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </div>
                        </ul>
                    </div>
                </nav>
                
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="text-light mt-5" style="background: #212529;" id="about">
            <div class="container py-3 mt-3">
                <div class="row mt-3">
                    <div class="col-lg-3 col-sm-6 pb-2">
                        <p class="head mb-3">CAN WE HELP YOU?</p>

                        <p style="font-size:12px;">SEND EMAIL</p>
                        <p class="mb-4" style="font-size:12px;">CONTACTUS@NGC.COM.PK</p>
                        <p style="font-size:12px;">UAN: 042 111-11-1111</p>
                        <p style="font-size:12px;">MON-FRI 9:00 TO 5:30 PST</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 pb-2">
                        <p class="head mb-3">HELP</p>
                        <ul class="list-unstyled">
                            <li><a href="#">
                                    <p>FAQ'S</p>
                                </a></li>
                            <li><a href="{{ route('login') }}">
                                    <p>LOG IN/SIGN UP</p>
                                </a></li>
                            <li><a href="#">
                                    <p>HOW TO BUY</p>
                                </a></li>
                            <li><a href="#">
                                    <p>PAYMENT</p>
                                </a></li>
                            <li><a href="#">
                                    <p>SHIPPING & DELIVERIES</p>
                                </a></li>
                            <li><a href="#">
                                    <p>EXCHANGE & RETURNS</p>
                                </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 pb-2">
                        <p class="head mb-3">ABOUT NGC</p>
                        <ul class="list-unstyled">
                            <li><a href="#">
                                    <p>ABOUT US</p>
                                </a></li>
                            <li><a href="{{ url('/contact') }}">
                                    <p>CONTACT US</p>
                                </a></li>
                            <li><a href="#">
                                    <p>WORK WITH US</p>
                                </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 pb-2">
                        <p class="head mb-3">PAYMENT METHODS</p>
                        <ul class="list-unstyled" style="font-size:13px;">
                            
                            <li><i class="fa-solid fa-truck" style="font-size:20px;"></i>&emsp;<a href="#">CASH
                                    ON
                                    DELIVERY</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <hr class="mr-auto bg-light">
            <div class="container-fluid text-center head">
                &copy; 2022,NGC &emsp;/ &emsp;<a href="#">TERMS AND CONDITIONS</a> &emsp;/&emsp;<a
                    href="#">PRIVACY POLICY</a>
            </div>
        </footer>
    </div>
</body>

</html>
