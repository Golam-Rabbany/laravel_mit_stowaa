<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productorder;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class FrontendController extends Controller
{

    public function backend(){
        return view('backend');
    }

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
        //
    }

    public function show()
    {
        return view('frontend.account.account');
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

    public function product_details($id){
        $single_product = Product::where('id', $id)->firstOrFail();
        return view('frontend.product.product_details',compact('single_product'));
    }

    public function account(){
        $user_order = Productorder::where('user_id', Auth::user()->id)->get();
        return view('frontend.account.account',compact('user_order'));
    }

    public function test(){
        $permission = Permission::find(2);
        $role = Role::find(2);
        // $user = User::find(1);

        $permission->assignRole($role);

    }
}
