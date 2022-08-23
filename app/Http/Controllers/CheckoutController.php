<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function index($coupon_name = "")
    {

        // ----without coupon this code----
        
        $error_msg = "";
        $discount_amount = 0;

        if($coupon_name == ""){
            $error_msg = "";
        }else{

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
                        $error_msg = "You have to shop more than ".Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchage_amount." tk";
                    }else{
                         $discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
                        // echo "done";
                    }
                  
                }
                
            }

        }

        

    // ----end without coupon this code----

        $cart = Session::get('cart', []);
        $products = Product::select(['id', 'product_name', 'sale_price', 'product_photo', 'quantity'])
            ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

        $carts = collect($cart)->map(function ($data) use ($products) {
            $data['product'] = $products[$data['product_id']];
            return $data;
        });

        return view('frontend.checkout.index',compact('carts','discount_amount','error_msg', 'coupon_name'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        

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

    public function coupon($coupon_name = ""){


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
        return view('frontend.checkout.index',compact('carts','discount_amount','error_msg','coupon_name'));        
    }




}
