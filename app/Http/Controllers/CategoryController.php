<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categorys = Category::all();
        return view('backend.category.index',compact('categorys'));
    }


    public function create()
    {
        
        return view('backend.category.create');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'category_name'=>'required|unique:categories',
            // 'category_photo'=>'required|image|mimes:png,jpg,webp',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;

        if($request->hasFile('category_photo')){
            $uploaded = $request->file('category_photo');
            $filename=Str::slug($request->category_name)."_".rand(0,9999).'.'.$uploaded->getClientOriginalName();
            Image::make($uploaded)->save(public_path('uploads/category/'.$filename));
            $category->category_photo = $filename;
        }

        $category->save();
        return back()->with('success', 'Category added successfully');
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

    public function subcategory_store(Request $request){
        return $request;
    }
}
