<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('backend.subcategory.index',compact('category'));
    }

    public function create()
    {
        return view('backend.subcategory.create');
    }


    public function store(Request $request)
    {

        Subcategory::insert($request->except('_token') + [
            'created_at'=>Carbon::now(),
        ]);
        return back();
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


    public function sub_demo(Request $request){
        $subcategory = DB::table('subcategories')
        ->where("category_id",$request->category_id)
        ->pluck("subcategory_name","id");
        return response()->json($subcategory);
    }
}
