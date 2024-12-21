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
        

        <div class="nav-scroller bg-white pb-5 shadow-sm mt-5">
            <nav class="nav ml-3
            ">
              <a class="dash nav-link border border-dark" href="{{ route('products.index') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <a class="dash nav-link" href="#"><i class="fa-solid fa-users"></i> Users</a>
                <a class="dash nav-link" href="#"><i class="fa-solid fa-box-open"></i> Orders</a>
                <a class="dash nav-link" href="#"><i class="fa-solid fa-user"></i> Profile</a>
                <a class="dash ad nav-link" href="{{ route('products.create') }}"><i class="fa-solid fa-circle-plus"></i> Add Products</a>
                <a class="dash ch nav-link" href="#"><i class="fa-solid fa-check-to-slot"></i> Check Products</a>
                <a class="dash dl nav-link" href="#"><i class="fa-solid fa-trash-can"></i> Delete Products</a>
                
            </nav>
        </div>
    </div>

    
</body>

</html>
