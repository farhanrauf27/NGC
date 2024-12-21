<title>NGC - Product Details</title>
@extends('layouts.app')
@extends('layouts.categories')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container py-5">
    <div class="row">
        <!-- Product Detail Card -->
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg rounded-lg border-0">
                <a href="#" class="add-to-cart-icon position-absolute" data-product-id="{{ $product->id }}" style="top: 10px; right: 10px; text-decoration: none;" role="button">
                    <i class="fa fa-plus-circle text-dark" style="font-size: 1.5rem;"></i>
                    <span class="add-to-cart-tooltip">Add to Cart</span>
                </a>
                

                <script>
                    document.querySelectorAll('.add-to-cart-icon').forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault(); // Prevent default behavior (if it's in a form)
                
                            // Disable the button temporarily to prevent multiple clicks
                            if (this.disabled) return; // Prevent further clicks if already disabled
                            this.disabled = true;  // Disable the button
                
                            const productId = this.getAttribute('data-product-id');
                
                            // Check if the product ID exists before proceeding with the fetch
                            if (!productId) {
                                console.error('Product ID is missing');
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
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert(data.message); // Successfully added product to cart
                                } else {
                                    alert('Failed to add product to cart.');
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
                <!-- Product Image -->
                <div class="image-container" style="height: 400px; overflow: hidden;">
                    <img class="card-img-top w-100 h-100" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="object-fit: contain; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                </div>
                

                <div class="card-body">
                    <!-- Product Name -->
                    <h3 class="card-title text-center text-primary mb-4">{{ $product->name }}</h3>

                    <!-- Product Description -->
                    <p class="card-text">
                        <strong class="text-dark">Title:</strong> <span class="text-muted">{{ $product->title }}</span><br>
                        <strong class="text-dark">Brand:</strong> <span class="text-muted">{{ $product->brand }}</span><br>
                        <strong class="text-dark">Price:</strong> <span class="text-muted">Rs. {{ number_format($product->price, 2) }}</span><br><br>
                        
                        <strong class="text-dark">Description:</strong><br>
                        <p class="text-muted">{!! nl2br(e($product->description)) !!}</p>
                    </p>

                    <!-- Additional Info (Product ID) -->
                    <p class="text-muted text-center"><em>Product ID: {{ $product->id }}</em></p>

                    <!-- Button (Back to Products List) -->
                    <div class="text-center mt-4">
                        <a href="{{ route('products.allProducts') }}" class="btn btn-outline-primary btn-lg px-4 py-2 rounded-pill shadow-sm">
                            <i class="fa-solid fa-arrow-left"></i> Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
