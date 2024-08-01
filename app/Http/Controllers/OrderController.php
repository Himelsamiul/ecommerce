<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function orderList(){

        $orders = Order::latest()->with('product')->get();


        return view('backend.pages.order.orderList',compact('orders'));
    }



    public function report()
    {
        //dd('yes');
        $oders = Order::all();
        
        return view('backend.pages.report.report',compact('oders'));
    }

    public function reportSearch(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'from_date'    => 'required|date',
            'to_date'      => 'required|date|after:from_date',
        ]);

        if($validator->fails())
        {

           Alert::error('From date and to date required and to should greater then from date.');
            return redirect()->back();
        }

       $from=$request->from_date;
       $to=$request->to_date;

        $orders=Order::whereBetween('created_at', [$from, $to])->get();
        return view('backend.pages.report.report',compact('orders'));

    }

    public function confirm($id)
    {
        $status = Order::findOrFail($id);

        $status->update([

            'status' => 'confirm',
        ]);

        Alert::success('Order Confirmed successfully.');
        return redirect()->back();
    }

    public function cancel($id)
    {
        $status = Order::findOrFail($id);

        $status->update([

            'status' => 'Cancelled',
        ]);

        Alert::success('Order Cancelled successfully.');
        return redirect()->back();
    }
}
