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
                <h2>Profile</h2>
            </div>
            <hr class="w-25 border border-dark">
        </div>
    </div>

    <div class="container mt-5">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                <small class="form-text text-muted">Leave blank if you don't want to change your password.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
