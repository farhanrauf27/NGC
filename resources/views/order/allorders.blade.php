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
            <h2>All Orders</h2>
        </div>
        <hr class="w-25 border border-dark">
    </div>
</div>

    <div class="container mt-5">

        @if ($orders->isEmpty())
            <div class="alert alert-info text-center">No orders have been placed yet.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover shadow-lg">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order #</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="bg-light">
                                <td>{{ $order->id }}</td>
                                <td>{{ ucfirst($order->user->name) }}</td>
                                <td>Rs. {{ number_format($order->total) }}</td>
                                <td>
                                    <span class="badge badge-{{ $order->status == 'done' ? 'success' : ($order->status == 'inprocess' ? 'info' : 'warning') }}">

                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Status change form -->
                                    <form action="{{ route('allOrder.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        <select name="status" class="form-control custom-select" onchange="this.form.submit()">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="inprocess" {{ $order->status == 'inprocess' ? 'selected' : '' }}>Inprocess</option>
                                            <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Done</option>
                                        </select>
                                    </form>                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Custom Styles -->
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .table {
            background-color: #fff;
            border-radius: 8px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }

        th {
            font-weight: bold;
            color: #fff;
        }

        .thead-dark {
            background-color: #343a40;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .badge {
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 12px;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .form-control.custom-select {
            width: 160px;
            margin: 0 auto;
            padding: 8px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s;
        }

        .form-control.custom-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .table-responsive {
            margin-top: 30px;
        }
    </style>
@endsection
