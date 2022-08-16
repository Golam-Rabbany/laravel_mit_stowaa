<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Subcategory;
use App\Http\Controllers\SubcategoryController;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cart = Session::get('cart', []);
    $products = Product::select(['id', 'product_name', 'sale_price', 'product_photo'])
        ->whereIn('id', array_column($cart, 'product_id'))->get()->keyBy('id');

    $carts = collect($cart)->map(function ($data) use ($products) {
        $data['product'] = $products[$data['product_id']];
        return $data;
    });


    return view('welcome',compact('carts'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::middleware(['auth'])->group(function(){
    
    
    Route::resource('/frontend', FrontendController::class);
    Route::get('/backend', [FrontendController::class, 'backend'])->name('backend');
        
    Route::resource('/category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);

    Route::resource('/product', ProductController::class);

    //category to subcategory
    Route::get('/getSubcategory/{id}', [ProductController::class, 'getSubcategory'])->name('getSubcategory');

    Route::resource('/cart', CartController::class);

    Route::resource('/checkout', CheckoutController::class);

    Route::resource('/order', OrderController::class);
    Route::post('/status/update/{id}', [OrderController::class, 'status_update'])->name('order.status.update');
});


Route::get('details/product/{id}', [FrontendController::class, 'product_details'])->name('product.details');

Route::get('/user_order', [OrderController::class, 'user_order'])->name('user_order');

Route::get('/account', [FrontendController::class, 'account'])->name('account');

Route::get('test', [FrontendController::class, 'test']);