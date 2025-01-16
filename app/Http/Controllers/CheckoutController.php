<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []); 
        $cartSubtotal = $this->calculateSubtotal($cart);

        return view('checkout', compact('cart', 'cartSubtotal'));
    }

    public function submit(Request $request)
    {
        return redirect()->route('checkout')->with('message', 'Order placed successfully!');
    }

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
    $validated = $request->validate([
        'address' => 'required|string',
        'city' => 'required|string',
        'zip' => 'required|string',
        'phone' => 'required|string',
    ]);

    $cart = session('cart', []);
    $cartTotal = array_reduce($cart, function($sum, $item) {
        return $sum + ($item['price'] * $item['quantity']);
    }, 0);

    $order = Order::create([
        'user_id' => Auth::id(), 
        'address' => $request->address,
        'city' => $request->city,
        'zip' => $request->zip,
        'phone' => $request->phone,
        'total' => $cartTotal,
        'status' => 'pending', 
    ]);
    session()->forget('cart'); 
    return redirect()->route('order.success')->with('order', $order);
}
public function showOrders()
{
    $orders = Order::where('user_id', Auth::id())->get();
    return view('order.index', compact('orders'));
}

}

