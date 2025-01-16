<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showOrders()
    {
        $orders = Order::with('user')->get(); 

        return view('order.allOrders', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,inprocess,done',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('allOrders')->with('success', 'Order status updated successfully!');
    }
}
