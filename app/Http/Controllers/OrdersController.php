<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Orders;
use App\Models\Order_details;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Illuminate\Support\Carbon;
use App\Models\Products;


class OrdersController extends Controller
{
    public function displayOrders()
    {
        $orders = Orders::latest()->get();
        return view('Orders', compact('orders'));
    }
    
    public function viewOrder($order_id)
    {
        $orders = Orders::where('id', $order_id)->first();
        $ordersDetails= Order_details::where('order_id',$order_id)->with('products')->orderBy(Products::select('user_id')->whereColumn('order_details.user_id', 'products.user_id'))->paginate(100);
        return view('Order_Details', compact('orders', 'ordersDetails'));
    }

    public function stripeOrder(Request $request)
    {


         \Stripe\Stripe::setApiKey('sk_test_51JJ4HyGsvR9cIeB2T0W7YKiR9sQO8MU7izak2HLaptz6rH9w2u5PNO3Kiwg7N2dNGxpepO87dYNVFUWbkNixdZ5M00IB4K8nnp');

         $token = $_POST['stripeToken'];

         $charge = \Stripe\Charge::create([
            'amount' => Cart::total()*100,
            'currency' => 'usd',
            'description' => 'Online Store',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
            ]);

            $order_id = Orders::insertGetId([
                'Surname' => $request->Surname,
                'Firstname' => $request->Firstname,
                'Email' => $request->Email,
                'Phone_number' => $request->Phone_number,
                'payment_id' => $charge->payment_method,
                'paying_amount' => $charge->amount,
                'total' => Cart::total(),
                'stripe_order_id' => $charge->metadata->order_id,
                'status' => $charge->status,
                'created_at' => carbon::now()
            ]);


            $invoice = Orders::findOrFail($order_id);
            $data = [
                'Surname' => $invoice->Surname,
                'Firstname' => $invoice->Firstname,
                'Email' => $invoice->Email,
                'total' => $invoice->total,
            ];

            Mail::to($request->Email)->send(new OrderMail($data));

            $content = Cart::content();
            $details = array();
            foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['user_id'] = $row->user_id;
            $details['product_name'] = $row->name;
            $details['quantity'] = $row->qty;
            $details['singleprice'] = $row->price;
            $details['totalprice'] = $row->qty*$row->price;
            Order_details::insert($details); 
        
            }


            Cart::destroy();

            $notification = array(
                'message' => 'Succesful Purchase',
                'alert-type' => 'success'
            );
            return Redirect()->to('/')->with($notification);
    }

    public function deleteOrder($id)
    {
        Orders::find($id)->delete();
        return Redirect()->back()->with('success' , 'Order Deleted Successfully');
    }
}
