<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
{
    $cart = session()->get('cart', []); // Retrieve the cart data from session
    return view('cart.index', compact('cart')); // Pass the cart to the view
}

public function add(Request $request)
{
    if (!Auth::check()) {
        return response()->json([
            'success' => false,
            'message' => 'You need to log in to add products to your cart.',
        ], 401);
    }

    $productId = $request->input('product_id');
    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Product not found.']);
    }

    // Retrieve or initialize the cart session
    $cart = session()->get('cart', []);

    // Check if the product already exists in the cart
    if (isset($cart[$productId])) {
        // If the product already exists, increment the quantity
        $cart[$productId]['quantity']++;
    } else {
        // Otherwise, add the product to the cart
        $cart[$productId] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1
        ];
    }

    // Save the updated cart back to the session
    session()->put('cart', $cart);

    return response()->json(['success' => true, 'message' => 'Product added to cart.']);
}


    public function showCart()
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }
    public function removeFromCart($id)
{
    $cartItem = CartItem::findOrFail($id);

    if ($cartItem->user_id == Auth::id()) {
        $cartItem->delete();
    }

    return redirect()->route('cart.show')->with('success', 'Item removed from cart.');
}
public function remove($productId)
{
    // Retrieve the cart from the session
    $cart = session()->get('cart', []);

    // Check if the product exists in the cart
    if (isset($cart[$productId])) {
        // Remove the product from the cart
        unset($cart[$productId]);
        
        // Save the updated cart back to the session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
}
public function update(Request $request)
    {
        // Get the cart from the session, or initialize it if it's empty
        $cart = session()->get('cart', []);

        // Update the cart with new quantities
        foreach ($request->cart as $updatedItem) {
            $productId = $updatedItem['product_id'];
            $newQuantity = $updatedItem['quantity'];

            // Update the quantity of the product in the cart
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $newQuantity;
            }
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        // Return a success response
        return response()->json(['success' => true]);
    }

}

