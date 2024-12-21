@extends('layouts.app')
@extends('layouts.categories')
@section('content')
<div class="contianer ml-5 row">
    <h3>
        <br><br>
        <b>All RAMs</b>
        <hr class="mr-4 bg-dark">
        <br>
    </h3>
</div>
<div class="container">
    
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card mb-4 shadow-sm rounded-lg h-100 position-relative">
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
                    <img class="card-img-top" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="height: 300px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                
                    <div class="card-body d-flex flex-column">
                        <!-- Product Title -->
                        <h5 class="card-title text-center text-primary font-weight-bold">{{ $product->name }}</h5>
                
                        <!-- Product Description -->
                        <p class="card-text text-muted">
                            <small>{{ $product->title }}</small><br>
                            <strong>Brand:</strong> {{ $product->brand }}<br>
                            <strong>Price:</strong> Rs. {{ number_format($product->price, 2) }}
                        </p>
                
                        <!-- Button -->
                        <a href="{{ route('productss.show', $product->id) }}" class="btn btn-primary mt-auto text-center align-self-center w-75 rounded-pill">
                            <i class="fa-solid fa-eye"></i> View Product
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
