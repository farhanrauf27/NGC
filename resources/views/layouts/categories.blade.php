<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>NGC - Products</title>
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
    <div class="nav-scroller bg-white pb-5 shadow-sm mt-5">
        <nav class="nav ml-3">
            <a class="dash nav-link {{ Route::is('products.allProducts') ? 'active' : '' }}" href="{{ route('products.allProducts') }}">
                <i class="fa-solid fa-box-open"></i> All Products
            </a>
            <a class="dash nav-link {{ Route::is('products.displays') ? 'active' : '' }}" href="{{ route('products.displays') }}">
                <i class="fa-solid fa-tv"></i> Displays
            </a>
            <a class="dash nav-link {{ Route::is('products.ram') ? 'active' : '' }}" href="{{ route('products.ram') }}">
                <i class="fa-solid fa-microchip"></i> RAM
            </a>
            <a class="dash nav-link {{ Route::is('products.ssd') ? 'active' : '' }}" href="{{ route('products.ssd') }}">
                <i class="fa-solid fa-hdd"></i> SSD
            </a>
            <a class="dash nav-link {{ Route::is('products.mouse') ? 'active' : '' }}" href="{{ route('products.mouse') }}">
                <i class="fa-solid fa-mouse"></i> Mouse
            </a>
            <a class="dash nav-link {{ Route::is('products.keyboards') ? 'active' : '' }}" href="{{ route('products.keyboards') }}">
                <i class="fa-solid fa-keyboard"></i> Keyboards
            </a>
            <a class="dash nav-link {{ Route::is('products.headphones') ? 'active' : '' }}" href="{{ route('products.headphones') }}">
                <i class="fa-solid fa-headphones"></i> Headphones
            </a>
            
        </nav>
    </div>
    

</body>
</html>