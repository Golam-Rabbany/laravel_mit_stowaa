@extends('master.dashboard_main')

@section('dashboard')

@can('admin')

        @if(session()->has('success'))
        <div class="alert alert-success block mb-2">
            {{ session()->get('success') }}
        </div>
        @endif

           
            <span class="text-2xl">Product Create Page</span>


                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf   
                    <div class="d-flex">
                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Category </label>
                          <select name="category_id" id="category_id" class="form-control">
                              <option value="">-----option-----</option>
                            @foreach (App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Sub Category </label>
                          <select name="subcategory_id" id="subCategory" class="form-control">
                            <option value="">-----option-----</option>
                                 
                          </select>
                        </div>
                    </div>
                    
                        <div class="mt-3 col-lg-12">
                            <label for="label-control">Product Name</label>
                            <input type="text" name="product_name"  class="form-control">
                            @error('product_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    

                    <div class="d-flex ">
                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Product Main Price</label>
                            <input type="number" name="main_price"  class="form-control">
                            @error('main_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Product Sale price</label>
                            <input type="number" name="sale_price"  class="form-control">
                            @error('sale_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    
                        <div class="mt-3 col-lg-12">
                            <label for="label-control">Short Description</label>
                            <textarea name="short_desc" class="form-control" rows="2"></textarea>
                            @error('short_desc')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-12">
                            <label for="label-control">Long Description</label>
                            <textarea name="long_desc" class="form-control" rows="4"></textarea>
                            @error('long_desc')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-12">
                            <label for="label-control">Information</label>
                            <textarea name="information" class="form-control" rows="4"></textarea>
                            @error('information')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    <div class="d-flex">
                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Product Photo</label>
                            <input type="file" name="product_photo"  class="form-control">
                            @error('product_photo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Quantity</label>
                            <input type="number" name="quantity"  class="form-control">
                            @error('quantity')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                        <button class="btn btn-info px-5 text-lg my-5  ml-3">Submit Product</button>
                    </form>

                        
@endcan
@endsection




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $("#category_id").change(function(){
            var category = $("#category_id").val();
            var u = "{{route('getSubcategory', 'id')}}";
            var url = u.replace('id', category);
            var value = '';
            $.get(url, function(data){
                if(data){
                    $("#subCategory").empty();
                    $("#subCategory").append('<option value="">--Select--</option>');
                    $.each(data,function(key,value){
                        $("#subCategory").append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                    });
                }else{
                    $("#subCategory").empty();
                }
            });
        });
    });
</script>