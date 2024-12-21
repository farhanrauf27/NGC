@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Your Cart</h1>

    @if (!empty($cart) && count($cart) > 0)
        <table class="table table-striped table-bordered shadow-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Image</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Price (Rs.)</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                @foreach ($cart as $productId => $item)
                    <tr>
                        <td class="text-center">
                            <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid" style="max-width: 80px; max-height: 80px;">
                        </td>
                        <td class="text-center">{{ $item['name'] }}</td>
                        <td class="text-center" id="price-{{ $productId }}">{{ number_format($item['price'], 2) }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning adjust-quantity" data-action="decrease" data-product-id="{{ $productId }}">-</button>
                            <span id="quantity-{{ $productId }}" class="mx-2">{{ $item['quantity'] }}</span>
                            <button class="btn btn-sm btn-success adjust-quantity" data-action="increase" data-product-id="{{ $productId }}">+</button>
                        </td>
                        <td class="text-center" id="total-{{ $productId }}">{{ number_format($item['price'] * $item['quantity']) }}</td>
                        <td class="text-center">
                            <form action="{{ route('cart.remove', $productId) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Subtotal Section -->
        <div class="text-right mt-4">
            <h4><strong>Subtotal:</strong><span id="cart-subtotal" class="text-success">0.00</span></h4>
            <!-- Redirect to Checkout Page -->
            <a href="{{ route('checkout') }}" class="btn btn-primary mt-3" style="width: 200px;">Proceed to Checkout</a>
        </div>
        
    @else
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50vh;">
        <div class="text-center">
            <div class="mb-4">
                <i class="fas fa-shopping-cart" style="font-size: 5rem;"></i>
            </div>
            <!-- Message -->
            <p class="text-muted" style="font-size: 1.5rem; font-family: 'Poppins', sans-serif;">
                Your cart is currently empty.
            </p>
            
            <!-- Divider -->
            <hr class="my-4" style="border-top: 2px solid #ddd; width: 60%; margin: 20px auto;">
    
            <!-- Button -->
            <a href="{{ route('products.allProducts') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-5 py-3">
                <i class="bi bi-cart-fill me-2"></i> Continue Shopping
            </a>
        </div>
    </div>
    @endif
</div>

<style>
    .btn-primary {
            background-color: #007bff;
            border: none;
            transition: all 0.3s ease;
        }
    
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
    
        .text-muted {
            color: #6c757d !important;
        }
    
        hr {
            border-radius: 10px;
        }
    .table th, .table td {
        vertical-align: middle;
    }
    
    .table td {
        padding: 15px;
    }
    
    .thead-dark th {
        background-color: #343a40;
        color: #ffffff;
    }
    
    .btn-warning {
        background-color: #f0ad4e;
        color: white;
    }
    
    .btn-success {
        background-color: #28a745;
        color: white;
    }
    
    .btn-danger {
        background-color: #dc3545;
        color: white;
    }
    
    

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .table th, .table td {
        text-align: center;
    }

    .text-right h4 {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update the cart subtotal and send data to the backend
        function updateCartSubtotal() {
            let subtotal = 0;
            let updatedCart = [];
    
            // Loop through each item in the cart
            document.querySelectorAll('.adjust-quantity').forEach(button => {
                const productId = button.getAttribute('data-product-id');
                const quantity = parseInt(document.getElementById('quantity-' + productId).innerText);
                const priceText = document.getElementById('price-' + productId).innerText.replace('$', '').trim();
const priceWithoutCommas = priceText.replace(/,/g, '');  // Remove commas
const price = parseFloat(priceWithoutCommas);

if (isNaN(price)) {
    console.error("Invalid price format for product ID:", productId);
    return;
}

const totalPrice = quantity * price;
document.getElementById('total-' + productId).innerText = 'Rs. ' + totalPrice.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
 // Ensure proper format

    
                // Add to subtotal (make sure it's added correctly)
                subtotal += totalPrice;
    
                // Update the cart with the current product's quantity
                updatedCart.push({
                    product_id: productId,
                    quantity: quantity
                });
            });
    
            // Update the subtotal in the DOM
            document.getElementById('cart-subtotal').innerText = 'Rs. ' + (subtotal / 2).toLocaleString();  // Update the overall subtotal with commas
    
            // Send the updated cart data to the backend
            fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    cart: updatedCart
                })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert('Failed to update the cart.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    
        // Update the subtotal whenever the quantity changes
        document.querySelectorAll('.adjust-quantity').forEach(button => {
            button.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                const productId = this.getAttribute('data-product-id');
                const quantityElement = document.getElementById('quantity-' + productId);
    
                // Get the current quantity
                let currentQuantity = parseInt(quantityElement.innerText);
    
                // Adjust quantity based on the action
                if (action === 'increase') {
                    currentQuantity++;
                } else if (action === 'decrease' && currentQuantity > 1) {
                    currentQuantity--;
                }
    
                // Update the quantity element
                quantityElement.innerText = currentQuantity;
    
                // Update the total price for this item and the overall subtotal
                updateCartSubtotal();
            });
        });
    
        // Initial update of the subtotal when the page loads
        updateCartSubtotal();
    });
    </script>
@endsection
