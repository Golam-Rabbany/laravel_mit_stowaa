<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('backend.banner.index',compact('banners'));
    }

    public function create()
    {
        return view('backend.banner.create');
    }

    public function store(Request $request)
    {

        $banner = Banner::insertGetId($request->except('_token')+[
            'created_at'=>Carbon::now(),
        ]);

        if($request->hasFile('banner_photo')){
           $uploaded =  $request->file('banner_photo')->store('uploads/banner');
        }
        Banner::find($banner)->update([
            'banner_photo'=> $uploaded, 
        ]);

        return back();
        // $banner = new Banner();
        // $banner->banner_title = $request->banner_title;
        // $banner->banner_short_desc = $request->banner_short_desc;
        // $banner->banner_main_price = $request->banner_main_price;
        // $banner->banner_sale_price = $request->banner_sale_price;
        // if($request->hasFile('banner_photo')){
        //     $uploaded = $request->file('banner_photo');
        //     $filename=rand(0,9999).'.'.$uploaded->getClientOriginalName();
        //     Image::make($uploaded)->save(public_path('uploads/banner/'.$filename));
        //     $banner->banner_photo = $filename;
            
        // }
        // $banner->save();
        // return back();
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

    public function download(Banner $banner, $id){
        return Storage::download(Banner::findOrFail($id)->banner_photo);
    }
}
