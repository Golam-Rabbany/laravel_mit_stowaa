<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use function Ramsey\Uuid\v1;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('backend.product.index',compact('products'));
    }

    public function create()
    {
        return view('backend.product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name'=>'required',
            'short_desc'=>'required',
            'main_price'=>'required',
            'quantity'=>'required',
            'product_photo'=> 'required|image|mimes:png,jpg,jpeg,webp',
        ]);


        $products = new Product();
        $products->category_id = $request->category_id;
        $products->subcategory_id = $request->subcategory_id;
        $products->product_name = $request->product_name;
        $products->sale_price = $request->sale_price;
        $products->main_price = $request->main_price;
        $products->short_desc = $request->short_desc;
        $products->long_desc = $request->long_desc;
        $products->information = $request->information;
        $products->quantity = $request->quantity;

        if($request->hasFile('product_photo')){
            $uploaded = $request->file('product_photo');
            $filename=Str::slug($request->product_name)."_".rand(0,9999).'.'.$uploaded->getClientOriginalName();
            Image::make($uploaded)->save(public_path('uploads/product/'.$filename));
            $products->product_photo = $filename;
        }

        $products->save();
        return back();        
    }

    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('backend.product.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $product->product_name = $request->product_name;
        $product->sale_price = $request->sale_price;
        $product->main_price = $request->main_price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->information = $request->information;
        $product->quantity = $request->quantity;


        if($request->hasFile('product_photo')){
            $delete_photo = public_path('uploads/product/'.$product->product_photo);
            if(File::exists($delete_photo)){
                File::delete($delete_photo);
            }
            $uploaded = $request->file('product_photo');
            $filename=Str::slug($request->product_name)."_".rand(0,9999).'.'.$uploaded->getClientOriginalName();
            Image::make($uploaded)->save(public_path('uploads/product/'.$filename));
            $product->product_photo = $filename;
        }

        $product->update();
        return back()->with('success', 'product update successfully done');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

    public function getSubcategory($id){
      
        return Subcategory::where('category_id',$id)->get();

   }
}
