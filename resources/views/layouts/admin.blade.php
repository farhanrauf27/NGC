<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>NGC - ADMIN</title>
        {{-- <title>NGC - Next Gen Computex</title> --}}
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        {{-- bootstrap icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    
    
        {{-- DATATABLES --}}
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        {{-- DATATABLES end --}}
    
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
            .active
            {
                border: 1px solid #212529;
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
            .nav-link.active {
        border-bottom: 1px solid black; /* Add border at the bottom */
        color: #007bff; /* Change text color for active link */
    }
    
        </style>
</head>
<body>
    <div class="header">
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light shadow-sm">
                <a class="navbar-brand" href="{{ route('products.index') }}">NGC <span class="h6">->Admin</span></a>
                <button class="navbar-toggler " type="button" data-toggle="offcanvas">
                    <i class="fa-solid fa-bars"></i></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav ml-auto">
                        
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
            <nav class="nav ml-3">
                <a class="dash nav-link {{ Route::is('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
                <a class="dash nav-link {{ Route::is('usertable') ? 'active' : '' }}" href="{{ route('usertable') }}">
                    <i class="fa-solid fa-users"></i> Users
                </a>
                <a class="dash nav-link {{ Route::is('allOrders') ? 'active' : '' }}" href="{{ route('allOrders') }}">
                    <i class="fa-solid fa-box-open"></i> Orders
                </a>
                <a class="dash nav-link {{ Route::is('profile.show') ? 'active' : '' }}" href="{{ route('profile.show') }}">
                    <i class="fa-solid fa-user"></i> Profile
                </a>
                <a class="dash ad nav-link {{ Route::is('products.create') ? 'active' : '' }}" href="{{ route('products.create') }}">
                    <i class="fa-solid fa-circle-plus"></i> Add Products
                </a>
            </nav>
        </div>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
    
            $(function () { $("[data-toggle = 'tooltip']").tooltip(); });
    
            nav = document.querySelector(".nav").querySelectorAll("a");
            console.log(nav);
            nav.forEach(element=>{
                    element.addEventListener("click",function() {
                        nav.forEach(nav=>nav.classList.remove("active"))
                        
                        this.classList.add("active");
                    })
            });
        </script>
        
    </div>
    <main role="main" class="container">
        <p>
            @yield('content')
        </p>
    </main></body>
</html>