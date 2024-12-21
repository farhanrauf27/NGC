@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Your Orders</h2>

    @if(Auth::check())
        @if ($orders->isEmpty())
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50vh;">
            <div class="text-center">
                <div class="alert alert-info py-4 px-5 rounded shadow-lg">
                    <h4 class="mb-3 text-primary">You have no orders yet.</h4>
                    <p class="text-secondary">It looks like you haven't placed an order yet. Browse our amazing products and find something you love!</p>
                </div>
                <a href="{{ route('products.allProducts') }}" class="btn btn-primary btn-lg mt-3 px-5 py-3 rounded-pill shadow-sm">
                    Go to Shop
                </a>
            </div>
        </div>
        @else
            <div class="row">
                <!-- Current Orders Section -->
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <h4 class="mb-0">Current Orders</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $currentOrders = $orders->filter(fn($order) => in_array($order->status, ['pending', 'inprocess']));
                            @endphp

                            @if ($currentOrders->isEmpty())
                                <div class="alert alert-info">You have no current orders.</div>
                            @else
                                @foreach ($currentOrders as $order)
                                    <div class="order-card mb-4 p-3 border rounded">
                                        <div class="order-header d-flex justify-content-between">
                                            <h5 class="text-primary">Order #{{  $loop->iteration }} - <small class="text-muted">{{ ucfirst($order->status) }}</small></h5>
                                            <span><strong>Ordered on:</strong> {{ $order->created_at->format('d M Y') }}</span>
                                        </div>
                                        <table class="table table-striped table-sm mt-3">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->items as $item)
                                                {{ dd($item) }}
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2" class="text-end"><strong>Total:</strong></td>
                                                    <td><strong>Rs. {{ number_format($order->total, 2) }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Previous Orders Section -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">Previous Orders</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $previousOrders = $orders->filter(fn($order) => $order->status === 'done');
                            @endphp

                            @if ($previousOrders->isEmpty())
                                <div class="alert alert-info">You have no previous orders.</div>
                            @else
                                @foreach ($previousOrders as $order)
                                    <div class="order-card mb-3 p-2 border rounded">
                                        <h6 class="text-success">Order #{{  $loop->iteration }}</h6>
                                        <p class="mb-1"><strong>Ordered on:</strong> {{ $order->created_at->format('d M Y') }}</p>
                                        <p><strong>Total:</strong> Rs. {{ number_format($order->total, 2) }}</p>
                                        <hr>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50vh;">
            <div class="text-center">
                <div class="alert alert-warning py-4 px-5 rounded shadow-lg">
                    <h4 class="mb-3 text-danger">Please Log In</h4>
                    <p class="text-secondary">You need to log in to view your orders and complete your purchases. Please log in to continue.</p>
                </div>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3 px-5 py-3 rounded-pill shadow-sm">
                    Log In
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
    