<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function index()
    {
        return view('backend.coupon.index');
    }

    public function create()
    {
        return view('backend.coupon.create');
    }

    public function store(Request $request)
    {
        Coupon::insert($request->except('_token')+[
            'added_by'=>Auth::user()->name,
            'created_at'=>Carbon::now(),
        ]);
    }

    public function show(Coupon $coupon)
    {
        //
    }

    public function edit(Coupon $coupon)
    {
        //
    }

    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    public function destroy(Coupon $coupon)
    {
        //
    }
}
