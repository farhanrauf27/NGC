@extends('layouts.app')
@extends('layouts.categories')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container ml-5 row">
    <h3>
        <br><br>
        <b>All Products</b>
        <hr class="mr-4 bg-dark">
        <br>
    </h3>
</div>

<div class="container py-5">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm rounded-lg h-100 position-relative">
                <!-- Plus Icon for Add to Cart -->
                <a href="#" class="add-to-cart-icon position-absolute" data-product-id="{{ $product->id }}" style="top: 10px; right: 10px; text-decoration: none;" role="button">
                    <i class="fa fa-plus-circle text-dark" style="font-size: 1.5rem;"></i>
                    <span class="add-to-cart-tooltip">Add to Cart</span>
                </a>

                <!-- Product Image with fixed height -->
                <img class="card-img-top" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                    style="height: 300px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">

                <div class="card-body d-flex flex-column">
                    <!-- Product Title -->
                    <h5 class="card-title text-center text-primary font-weight-bold">{{ $product->name }}</h5>

                    <!-- Product Description -->
                    <p class="card-text text-muted mb-3">
                        <small>{{ $product->title }}</small><br>
                        <strong>Brand:</strong> {{ $product->brand }}<br>
                        <strong>Price:</strong> Rs. {{ number_format($product->price, 2) }}
                    </p>

                    <!-- Button -->
                    <a href="{{ route('productss.show', $product->id) }}"
                        class="btn btn-primary mt-auto text-center align-self-center w-75 rounded-pill">
                        <i class="fa-solid fa-eye"></i> View Product
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Include styles at the bottom if it's needed only for this page -->
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

<!-- Include JavaScript for Add to Cart functionality -->
<script>
    document.querySelectorAll('.add-to-cart-icon').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default behavior

            // Disable the button temporarily to prevent multiple clicks
            if (this.disabled) return; // Prevent further clicks if already disabled
            this.disabled = true; // Disable the button

            const productId = this.getAttribute('data-product-id');

            // Check if the product ID exists before proceeding with the fetch
            if (!productId) {
                console.error('Product ID is missing');
                this.disabled = false; // Re-enable the button
                return;
            }

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => {
                if (response.status === 401) {
                    // Handle unauthorized response
                    alert('You need to log in to add products to your cart.');
                    window.location.href = '/login'; // Redirect to login page
                    return;
                }
                return response.json();
            })
            .then(data => {
                if (data && data.success) {
                    alert(data.message); // Successfully added product to cart
                } else if (data) {
                    alert(data.message || 'Failed to add product to cart.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            })
            .finally(() => {
                this.disabled = false; // Re-enable the button after the operation
            });
        });
    });
</script>

@endsection
