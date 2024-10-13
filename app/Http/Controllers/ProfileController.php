<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){

        $order = Order::with('user','product')->where('user_id',auth()->user()->id)->get();

        return view('frontend.pages.profile',compact('order'));
    }

    // App\Http\Controllers\ProfileController.php


    public function showPayslip($orderId)
    {
        // Fetch the specific order by its ID, ensuring it belongs to the authenticated user
        $order = Order::with('user', 'product')
            ->where('id', $orderId)
            ->where('user_id', auth()->user()->id)
            ->first();
        
        // If the order is not found, redirect with an error message
        if (!$order) {
            return redirect()->route('profile')->with('error', 'Order not found');
        }
        
        // Pass the order to the 'payslip' view
        return view('frontend.pages.payslip', compact('order')); // Use 'order' for clarity
    }
    
    

    
}
