{{-- @extends('layouts.dashNav')

@section('content')

<style>
    td
    {
        font-weight: 600;
    }
</style>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-4 ">
                <h2>Products</h2>
            </div>
            <hr class="w-25 border border-dark">
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive-sm mt-4">
        <table class="table table-bordered" id="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Title</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Price $</th>
                    <th scope="col">Screen Size</th>
                    <th scope="col">Resolution</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
                 @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/images/{{ $product->image }}" width="100px"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->ss }}</td>
                <td>{{ $product->resolution }}</td>
                <td>{{ $product->type}}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <div class="btn btn-group btn-sm">
                            <a class="btn btn-outline-info" href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>

                        <a class="btn btn-outline-primary" href="{{ route('products.edit', $product->id) }}"><i
                                class="fas fa-edit    "></i></a>

                        @csrf
                        @method('DELETE')

                        <a type="submit" role="button"class="btn btn-outline-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
            </thead>
        </table>
    </div>

    {!! $products->links() !!}
@endsection --}}


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
    border-bottom: 2px solid #007bff; /* Add border at the bottom */
    color: #007bff; /* Change text color for active link */
}

    </style>

</head>

<body>
    @extends('layouts.admin')

    @section('content')
  
    <main role="main" class="container">
        <p>
            <style>
                td {
                    font-weight: 600;
                }
            </style>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mt-4 ">
                    <h2>Products</h2>
                </div>
                <hr class="w-25 border border-dark">
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="table-responsive-sm mt-4">
            <table class="table table-bordered" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price Rs.</th>
                        
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>

                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="/images/{{ $product->image }}" width="100px"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->type }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <div class="btn btn-group btn-sm">
                                        <a class="btn btn-outline-info" href="{{ route('products.show', $product->id) }}" data-toggle = "tooltip" data-placement = "bottom"
                                            title = "View"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>

                                        <a class="btn btn-outline-primary"
                                            href="{{ route('products.edit', $product->id) }}" data-toggle = "tooltip" data-placement = "bottom"
                                            title = "Edit"><i
                                                class="fas fa-edit"></i></a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger" value="fa fa-trash" data-toggle = "tooltip" 
                                        data-placement = "bottom" title = "Delete"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                <a class="btn btn-outline-success" 
                                                href="{{ route('products.download', $product->id) }}" 
                                                data-toggle="tooltip" data-placement="bottom" 
                                                title="Download">
                                                 <i class="fa fa-download" aria-hidden="true"></i>
                                             </a>
                                    </div>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {!! $products->links() !!}
        </p>
    </main>
    @endsection

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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    $('#navbarDropdown').on('click', function (e) {
        e.preventDefault();
        $(this).next('.dropdown-menu').toggleClass('show');
    });
});

    </script>


</body>

</html>
