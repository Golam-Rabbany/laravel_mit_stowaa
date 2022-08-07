<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
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
