<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NGC - ADMIN</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <script src="{{ URL::asset('js/admin.js') }}"></script>

    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        
        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
        }
        table {
            font-size: 0.9rem;
            
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        thead {
            background-color: #343a40;
            color: white;
        }
        tbody tr:hover {
            background-color: #f1f3f5;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    @extends('layouts.admin')

    @section('content')
    <p>
        <style>
            td {
                font-weight: 600;
            }
        </style>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-4 ">
                <h2>Users</h2>
            </div>
            <hr class="w-25 border border-dark">
        </div>
    </div>

    <div class="container mt-5">
        <table id="userTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Creation Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucfirst($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('l, j F Y, h:i A') }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                language: {
                    search: "Filter records:",
                    paginate: {
                        previous: "Prev",
                        next: "Next"
                    }
                }
            });
        });
    </script>
</body>

</html>
