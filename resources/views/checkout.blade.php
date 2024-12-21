@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container mt-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <div class="row">
        <!-- Left Column: Shipping Address Form -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Shipping Address</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="address">Street Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="zip">Postal Code</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-3">Place Order</button>

                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column: Order Summary & Payment Method -->
        <div class="col-md-6">
            <!-- Order Summary -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Order Summary</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>Rs. {{ number_format($item['price'], 2) }}</td>
                                <td>Rs. {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
                                <td><strong>Rs. {{ number_format($cartSubtotal, 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Payment Method: Cash on Delivery -->
            <div class="card">
                <div class="card-header">
                    <h4>Payment Method</h4>
                </div>
                <div class="card-body">
                    <p><strong>Cash on Delivery</strong></p>
                    <p>You will pay for your order upon delivery.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Order Placed!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Okay',
        });
    </script>
@endif

@endsection
