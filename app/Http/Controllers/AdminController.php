<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display all orders
    public function showOrders()
    {
        // Get all orders with their associated user names and status
        $orders = Order::with('user')->get(); // Assuming 'user' is the relationship with the User model

        return view('order.allOrders', compact('orders'));
    }

    // Update the status of an order
    public function updateStatus(Request $request, Order $order)
    {
        // Validate the status
        $request->validate([
            'status' => 'required|in:pending,inprocess,done',
        ]);

        // Update the order status
        $order->update(['status' => $request->status]);

        // Redirect back with a success message
        return redirect()->route('allOrders')->with('success', 'Order status updated successfully!');
    }
}
