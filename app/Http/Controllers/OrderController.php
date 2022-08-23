<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Productorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {
        $cart = Session::get('cart', []);

        $products = Product::select(['id','product_name','sale_price','product_photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts= collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });

        $orders = Order::all();

        return view('backend.order.index',compact('orders','carts'));
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
        $checkouts->subtotal = $request->subtotal;
        $checkouts->delivery_charge = $request->delivery_charge;
        $checkouts->total = $request->total;
        $checkouts->discount_amount = $request->discount_amount;
        $checkouts->discount = $request->discount;

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
        return redirect()->route('account');
    }else{
        return redirect()->route('login');
    }
        
    }

    public function show($id)
    {


       $product_orders = Order::with('product_order.product')->where('id', $id)->first();
        return view('backend.order.product_order',compact('product_orders'));
    }


    public function edit($id)
    {
        $order_status = Order::find($id);
        return view('backend.order.order_status',compact('order_status'));
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $del = Order::find($id);
        $del->delete();
        return back();
    }

    public function user_order(){
        $user_orders =Productorder::where('user_id', Auth::user()->id)->get();
        return view('frontend.order.user_order',compact('user_orders'));
    }


    public function status_update(Request $request, $id){
        $order = Order::find($id);
        $order->order_status = $request->status;
        $order->save();
        return redirect()->route('order.index');
    }

    public function invoice(){
        return view('backend.order.invoice');
    }
    
}
