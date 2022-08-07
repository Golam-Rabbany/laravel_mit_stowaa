<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = Session::get('cart', []);
        $products = Product::select(['id', 'product_name', 'sale_price', 'product_photo', 'quantity'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts = collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });

        return view('frontend.checkout.index',compact('cart'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $checkouts = new Checkout();
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
        return back();

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
