@extends('master.dashboard_main')

@section('dashboard')

        @if(session()->has('success'))
        <div class="alert alert-success block mb-2">
            {{ session()->get('success') }}
        </div>
        @endif

           
            <span class="text-2xl">Product Edit Page</span>


                    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf   
                        @method('PUT')

                        <div class="mt-3 col-lg-12">
                            <label for="label-control">Product Name</label>
                            <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control">
                            @error('product_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    

                    <div class="d-flex ">
                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Product Main Price</label>
                            <input type="number" name="main_price" value="{{$product->main_price}}"  class="form-control">
                            @error('main_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Product Sale price</label>
                            <input type="number" name="sale_price" value="{{$product->sale_price}}" class="form-control">
                            @error('sale_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    
                        <div class="mt-3 col-lg-12">
                            <label for="label-control">Short Description</label>
                            <textarea name="short_desc" class="form-control" rows="2">{{$product->short_desc}}</textarea>
                            @error('short_desc')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-12">
                            <label for="label-control">Long Description</label>
                            <textarea name="long_desc" class="form-control" rows="4">{{$product->long_desc}}</textarea>
                            @error('long_desc')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-12">
                            <label for="label-control">Information</label>
                            <textarea name="information" class="form-control" rows="4">{{$product->information}}</textarea>
                            @error('information')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    <div class="d-flex">
                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Product Photo</label>
                            <input type="file" name="product_photo" class="form-control">
                            <img src="{{asset('uploads/product/'.$product->product_photo)}}" width="200px" alt="">
                            @error('product_photo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-3 col-lg-6">
                            <label for="label-control">Quantity</label>
                            <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control">
                            @error('quantity')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                        <button class="btn btn-info px-5 text-lg my-5  ml-3">Submit Product</button>
                    </form>

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