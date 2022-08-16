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
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                        <label for="category_name" class="text-lg">Category Name</label><br>
                        <input type="text" class="form-control border-2" name="category_name">
                        @error('category_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                        <div class="">
                            <label for="label-control">Category Photo</label>
                            <input type="file" name="category_photo"  class="form-control">
                            @error('category_photo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn mt-3" style="background: red; color:white">Create Category</button>
                    </form>
                </div>

@endcan
@endsection