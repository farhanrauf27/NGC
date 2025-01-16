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
    $cart = session()->get('cart', []); 
    return view('cart.index', compact('cart')); 
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

    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1
        ];
    }

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
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
}
public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->cart as $updatedItem) {
            $productId = $updatedItem['product_id'];
            $newQuantity = $updatedItem['quantity'];

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $newQuantity;
            }
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }

}

