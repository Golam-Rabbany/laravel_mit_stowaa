<?php

use Illuminate\Support\Facades\Session;

function totalcount(){
    return App\Models\Category::count();
}

function order_model(){
    return App\Models\Order::all();
}

function cartSession(){
    return Session::get('cart', []);
}

?>