<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Productorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if(Auth::user()){
       
        $checkouts = new Order();
        $checkouts->email = Auth::user()->email;
        $checkouts->name = Auth::user()->name;
        $checkouts->full_name = $request->full_name;
        $checkouts->phone = $request->phone;
        $checkouts->country = $request->country;
        $checkouts->city = $request->city;
        $checkouts->street = $request->street;
        $checkouts->locality = $request->locality;
        $checkouts->address = $request->address;
        $checkouts->other = $request->other;
        $checkouts->delivary_system = $request->payment_method;
        $checkouts->save();

        foreach(Session::get('cart') as $carts){
            $product_order = new Productorder();
            $product_order->order_id = $checkouts->id;
            $product_order->user_id = Auth::user()->id;
            $product_order->product_id = $carts['product_id'];
            $product_order->quantity = $carts['quantity'];
            $product_order->save();
            
        }

        Session::forget('cart');
        return back();
    }else{
        return redirect()->route('login');
    }
        
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
