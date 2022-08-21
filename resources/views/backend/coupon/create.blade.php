@extends('master.dashboard_main')

@section('dashboard')

@can('admin')
    

        @if(session()->has('success'))
        <div class="alert alert-success block mb-2">
            {{ session()->get('success') }}
        </div>
        @endif

           
            <span class="text-2xl">Category Create Page</span>

                <div class="mt-4 ml-4">
                    <form action="{{route('coupon.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-3">
                        <label for="coupon_name" class="text-lg">Coupon Name</label><br>
                        <input type="text" class="form-control border-2" name="coupon_name">
                        @error('coupon_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                        
                        <div class="mt-3">
                            <label for="discount_amount" class="text-lg">Discount Amount</label>
                            <input type="text" name="discount_amount"  class="form-control">
                            @error('discount_amount')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="mt-3">
                            <label for="minimum_purchage_amount" class="text-lg">Maximum Purchage Amount</label>
                            <input type="text" name="minimum_purchage_amount"  class="form-control">
                            @error('minimum_purchage_amount')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="validity_till" class="text-lg">Validity Date</label>
                            <input type="date" name="validity_till"  class="form-control">
                            @error('validity_till')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn mt-3" style="background: red; color:white">Create Category</button>
                    </form>
                </div>

@endcan
@endsection