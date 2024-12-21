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

    {{--  --}}

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
    </style>

</head>

<body>
    @extends('layouts.admin')

    @section('content')


    <main role="main" class="container">
        <div class="row mt-2">
            <div class="col-lg-8 margin-tb mt-5 mb-3">
                <div class="pull-left">
                    <div class="pull-right">
                        <a class="btn bttn btn-outline-dark shadow w-25" href="{{ route('products.index') }}"><i class="fa-solid fa-caret-left"></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 margin-tb mt-5 mb-3">
                <div class="pull-left">
                    <h2>Add New Product</h2>
                </div>
                <hr class="w-25 border border-dark">
            </div>
        </div>
             
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
             
        <div class="container">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                        <div class="form-group">
        
                            <input type="text" name="code"  placeholder="Code">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                        <div class="form-group">
                            
                            <input type="text" name="title" placeholder="Tile of product">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                        <div class="form-group">
                            
                            <input type="text" name="brand"  placeholder="Brand of Product">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                        <div class="form-group">
                            
                            <input type="text" name="price"  placeholder="Price">
                        </div>
                    </div>
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                        <div class="form-group">
        
                            <input type="text" name="type"  placeholder="Product type">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                        <div class="form-group">
                            
                            <input type="file" name="image" placeholder="Image of Product">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn bttn btn-outline-dark mt-5 mb-5 shadow w-25">Submit <i class="fa-solid fa-arrow-up-from-bracket ml-2"></i></button>
                    </div>
                </div>
                 
            </form>
        </div>
        @endsection

    <script>

        nav = document.querySelector(".nav").querySelectorAll("a");
        console.log(nav);
        nav.forEach(element=>{
                element.addEventListener("click",function() {
                    nav.forEach(nav=>nav.classList.remove("active"))
                    
                    this.classList.add("active");
                })
        });
    </script>
    <script>
        
    </script>

</body>

</html>
