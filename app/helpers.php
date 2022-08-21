<?php

use Illuminate\Support\Facades\Session;

function totalcount(){
    return App\Models\Category::count();
}

function cartSession(){
    return Session::get('cart', []);
}

?>