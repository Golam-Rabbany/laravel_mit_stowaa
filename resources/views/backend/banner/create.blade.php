@extends('master.dashboard_main')

@section('dashboard')


        @if(session()->has('success'))
        <div class="alert alert-success block mb-2">
            {{ session()->get('success') }}
        </div>
        @endif

           
            <span class="text-2xl">Banner Create Page</span>

                <div class="mt-4">
                    <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="banner_title" class="text-lg">Banner Title</label><br>
                            <input type="text" class="form-control border-2" name="banner_title">
                            @error('banner_title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="banner_short_desc" class="text-lg">Banner Short Description</label><br>
                            <textarea name="banner_short_desc" class="form-control"></textarea>
                            @error('banner_short_desc')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="banner_main_price" class="text-lg">Banner Main Price</label><br>
                            <input type="number" class="form-control border-2" name="banner_main_price">
                            @error('banner_main_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="banner_sale_price" class="text-lg">Banner Sale Price</label><br>
                            <input type="number" class="form-control border-2" name="banner_sale_price">
                            @error('banner_sale_price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="">
                            <label for="label-control">Banner Photo</label>
                            <input type="file" name="banner_photo"  class="form-control">
                            @error('banner_photo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn mt-3" style="background: red; color:white">Create Banner</button>
                    </form>
                </div>


@endsection