@extends('master.dashboard_main')

@section('dashboard')
@can('admin')

        @if(session()->has('success'))
        <div class="alert alert-success block mb-2">
            {{ session()->get('success') }}
        </div>
        @endif

        <span class="text-2xl">Category Create Page</span>

        <div class="mt-4">
            <form action="{{route('subcategory.store')}}" method="POST">
                @csrf
                <div>
                <label for="category_name" class="text-lg">Sub Category Name</label><br>
                <select name="category_id" id="" class="form-control">
                    <option value="">-----option-----</option>
                    @foreach (App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>                        
                    @error('sub_category_name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
        </div>

        <div class="mt-4 text-lg">
            <label for="label-control">Sub Category Name</label>
            <input type="text" name="subcategory_name"  class="form-control">
            @error('subcategory_name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
            <button type="submit" class="btn mt-3" style="background: red; color:white">Create Category</button>
        </form>


    
@endcan
        
@endsection