<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index($coupon_name = "")
    {

        // ----without coupon this code----
        
        $error_msg = "";
        $discount_amount = 0;
        if(!Coupon::where('coupon_name', $coupon_name)->exists()){
            $error_msg = "This coupon does not match";
        }else{
            if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_name)->first()->validity_till){
                $error_msg = "Your coupon validity date is expired";
            }else{
                // $error_msg = "You have to shop ".Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchage_amount." tk";
              
                $subtotal = 0;
               
                foreach(Session::get('cart') as $cartSession){
                    
                    $subtotal += $cartSession['sale_price'] * $cartSession['quantity'] ;
                }

                if(Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchage_amount > $subtotal){
                    return $error_msg = "You have to shop more than ".Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchage_amount." tk";
                }else{
                     $discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
                    // echo "done";
                }
              
            }
            
        }

        // echo $error_msg;
      
        $cart = Session::get('cart', []);
        $products = Product::select(['id', 'product_name', 'sale_price', 'product_photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts = collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });
      return view('frontend.cart.index',compact('carts','discount_amount','error_msg'));




        // ----without coupon this code----

        // $cart = Session::get('cart', []);
        // $products = Product::select(['id', 'product_name', 'sale_price', 'product_photo'])
        //     ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        // $carts = collect($cart)->map(function ($data) use ($products) {
        //     $data['product'] = $products[$data['product_id']];
        //     return $data;
        // });

        // return view('frontend.cart.index',compact('carts'));


    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $alreadyOnCart = false;
        
        if ($request->session()->has('cart')) {
            $cartData = [];
            foreach (Session::get('cart') as $cart_row) {
                if ($cart_row['product_id'] == $request->product_id) {
                    $cart_row['quantity'] = $cart_row['quantity'] + $request->quantity;
                    $alreadyOnCart = true;
                }
                $cartData[] = $cart_row;
            }
            if ($alreadyOnCart) {
                Session::put('cart', $cartData);
            }
        }

        if (!$alreadyOnCart) {
            Session::push('cart', [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'product_name' => $request->product_name,
                'sale_price' => $request->sale_price,
            ]);
        }

        return redirect()->back()->with(['success' => 'The Product Add To Cart']);
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
        $item = Session::get('cart', []);
        foreach ($item as $key => $cart) {
            if ($cart['product_id'] == $id) {
                $item[$key]['quantity'] = $request->quantity;
            }
        }
        Session::put('cart', $item);
        return redirect()->back();
    }


    public function destroy($id)
    {
        Session::put('cart', array_filter(Session::get('cart', []), function ($item) use ($id) {
            return $item['product_id'] != $id;
        }));

        return redirect()->back()->with('delete');
    }


    public function coupon($coupon_name = ""){
       

        // $product=[];
        // foreach(Session::get('cart') as $cartS['quantity']){
        //     //  $cartS['product_id'];
        //      $product += $cartS['quantity'];
        //     // print_r($cartS->product_id);
        // }
        // return $product['quantity'];


        $error_msg = "";
        $discount_amount = 0;
        if(!Coupon::where('coupon_name', $coupon_name)->exists()){
            $error_msg = "This coupon does not match";
        }else{
            if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_name)->first()->validity_till){
                $error_msg = "Your coupon validity date is expired";
            }else{
                // $error_msg = "You have to shop ".Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchage_amount." tk";
              
                $subtotal = 0;
               
                foreach(Session::get('cart') as $cartSession){
                    
                    $subtotal += $cartSession['sale_price'] * $cartSession['quantity'] ;
                }

                if(Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchage_amount > $subtotal){
                    return $error_msg = "You have to shop more than ".Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchage_amount." tk";
                }else{
                     $discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
                    // echo "done";
                }
              
            }
            
        }

        // echo $error_msg;
      
        $cart = Session::get('cart', []);
        $products = Product::select(['id', 'product_name', 'sale_price', 'product_photo'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts = collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });
      return view('frontend.cart.index',compact('carts','discount_amount','error_msg'));
        
    }


    
}
