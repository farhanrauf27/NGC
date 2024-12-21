{{-- @extends('layouts.dashNav')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <section id="display">
        <div class="container mt-4 ">
            <div class="font-weight-bolder row">
                <h1>Admin Dash Board</h1><br>
            </div>
            <p class="lead"> click on Dashboard</p>
           
        </div>
            </section>
   

@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NGC - ADMIN</title>
    <title>NGC - Next Gen Computex</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <script src="{{ URL::asset('js/admin.js') }}"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .dash {
            font-size: 18px;
            color: #212529 !important;
            text-decoration: none !important;
        }

        .ad:hover {
            transition: 300ms all ease-in-out;
            color: green !important;
        }

        .ch:hover {
            transition: 300ms all ease-in-out;
            color: rgb(206, 158, 0) !important;
        }

        .dl:hover {
            transition: 300ms all ease-in-out;
            color: red !important;
        }
    </style>

</head>

<body>
    <div class="header">
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light shadow-sm">
                <a class="navbar-brand" href="{{ url('/') }}">NGC <span>->Next Gen
                        Computex</span></a>
                <button class="navbar-toggler " type="button" data-toggle="offcanvas">
                  <i class="fa-solid fa-bars"></i></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('super-admin/home')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                aria-expanded="false">Products</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item m-1" href="#display"><i class="fa-solid fa-display mr-1"></i>
                                    Displays</a>
                                <a class="dropdown-item m-1" href="#cpu"><i class="fa-solid fa-microchip mr-1"></i>
                                    CPU</a>
                                <a class="dropdown-item m-1" href="#gpu"><i class="bi bi-gpu-card mr-1"></i> GPU</a>
                                <a class="dropdown-item m-1" href="#motherboard"><i
                                        class="bi bi-motherboard-fill mr-1"></i> Motherboard</a>
                                <a class="dropdown-item m-1" href="#ram"><i class="fa-solid fa-memory mr-1"></i>
                                    RAM</a>
                                <a class="dropdown-item m-1" href="#hdd"><i class="fa-solid fa-hard-drive mr-1"></i>
                                    HDD</a>
                                <a class="dropdown-item m-1" href="#psu"><i
                                        class="fa-solid fa-plug-circle-bolt mr-1"></i> PSU</a>
                                <a class="dropdown-item m-1" href="#cooling "><i class="bi bi-fan mr-1"></i> Cooling
                                    System</a>
                                <a class="dropdown-item m-1" href="#cases"><i class="bi bi-pc mr-1"></i> Cases</a>
                                <a class="dropdown-item m-1" href="#mouse"><i class="bi bi-mouse3-fill mr-1"></i>
                                    Mouse</a>
                                <a class="dropdown-item m-1" href="#keyboard"> <i class="fas fa-keyboard mr-1"></i>
                                    Keyboard</a>
                                <a class="dropdown-item m-1" href="#headphone"><i class="fa fa-headphones mr-1"
                                        aria-hidden="true"></i> Headphone</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown ml-5 ">
                            <a id="navbarDropdown" class=" dropdown-toggle btn bttn btn-outline-dark btn-sm m-1"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                <i class="fa fa-circle-user mr-3 fa-fw"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item btn bttn btn-outline-dark" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="nav-scroller bg-white pb-5 shadow-sm mt-5">
            <nav class="nav ml-3
            ">
              <a class="dash nav-link border border-dark" href="{{ route('products.index') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <a class="dash nav-link" href="{{ route('usertable') }}"><i class="fa-solid fa-users"></i> Users</a>
                <a class="dash nav-link" href="#"><i class="fa-solid fa-box-open"></i> Orders</a>
                <a class="dash nav-link" href="#"><i class="fa-solid fa-user"></i> Profile</a>
                <a class="dash ad nav-link" href="{{ route('products.create') }}"><i class="fa-solid fa-circle-plus"></i> Add Products</a>
                <a class="dash ch nav-link" href="#"><i class="fa-solid fa-check-to-slot"></i> Check Products</a>
                <a class="dash dl nav-link" href="#"><i class="fa-solid fa-trash-can"></i> Delete Products</a>
                
            </nav>
        </div>
    </div>

    <main role="main" class="container">
        <p>
            
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

<section id="display">
    {{-- <div class="container mt-4 ">
        <div class="font-weight-bolder row">
            <h1>Admin Dash Board</h1><br>
        </div>
        <p class="lead"> click on Dashboard</p>
       
    </div>
        </section>
        </p>
    </main> --}}

    <div class="container spinner-grow d-flex justify-content-center mt-5" role="status">
        <span class="visually-hidden"></span>
      </div>
</body>

</html>

