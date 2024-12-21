<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Show checkout page
    public function index()
    {
        // Get cart data from session or database
        $cart = session('cart', []); // Assuming cart is stored in session
        $cartSubtotal = $this->calculateSubtotal($cart);

        return view('checkout', compact('cart', 'cartSubtotal'));
    }

    // Handle checkout form submission
    public function submit(Request $request)
    {
        // Handle saving order details and shipping address

        // You can store the order in the database and redirect the user to a confirmation page
        // For now, let's just simulate an order submission:
        
        return redirect()->route('checkout')->with('message', 'Order placed successfully!');
    }

    // Calculate the subtotal of the cart
    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }


    public function submitOrder(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'address' => 'required|string',
        'city' => 'required|string',
        'zip' => 'required|string',
        'phone' => 'required|string',
    ]);

    // Calculate the total (this can be dynamic depending on your cart structure)
    $cart = session('cart', []);
    $cartTotal = array_reduce($cart, function($sum, $item) {
        return $sum + ($item['price'] * $item['quantity']);
    }, 0);

    // Create the order and store it in the database
    $order = Order::create([
        'user_id' => Auth::id(), // Assuming the user is logged in
        'address' => $request->address,
        'city' => $request->city,
        'zip' => $request->zip,
        'phone' => $request->phone,
        'total' => $cartTotal,
        'status' => 'pending', // Mark as done
    ]);

    // Clear the cart after the order is placed
    session()->forget('cart'); // Assuming the cart is stored in the session

    // Redirect to a success page or order confirmation page
    return redirect()->route('order.success')->with('order', $order);
}
public function showOrders()
{
    // Fetch the orders for the logged-in user
    $orders = Order::where('user_id', Auth::id())->get();

    // Pass the orders to the view
    
    return view('order.index', compact('orders'));
}

}

