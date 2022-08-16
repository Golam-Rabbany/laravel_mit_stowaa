@extends('master.frontend_main')

@section('frontend')

<main>


    <section class="w-full bg-slate-200 py-4">
        <div class="container">
           <div class="row">
              <div class="flex justify-between">
                <div class="flex">
                    <h3 class="px-2"><a href="{{url('/')}}">Home</a></h3>
                    <i class="fa-solid fa-angle-right px-2"></i>
                    <h3 class="px-2"><a href="">Account</a></h3>
                </div>
                <div>
                    <h3 class="px-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                    </form>
                </h3>
                </div>
              </div>
              
           </div>
        </div>
       </section>

    <section class="account_section section_space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 account_menu">
                    <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Account Dashboard </button>
                        <button class="nav-link text-start w-100" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Acount</button>
                        <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                        
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                        <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <h5>Welcome {{strtoupper(Auth::user()->name)}}</h5>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <h5 class="text-center pb-3">Account Details</h5>
                            <form class="row g-3 p-2">
                                <div class="col-md-6">
                                    <label for="inputnamel4" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="inputnamel4" value="{{Auth::user()->name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" value="{{Auth::user()->email}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary active">Update</button>
                                </div>
                             </form>
                            </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <h5 class="text-center pb-3">Your Orders</h5>
                            
                            
                            <table class="table" style="margin: 2rem 0; font-family:sans-serif">
                                <thead style="font-size: 17px; background: rgb(2, 163, 175); color:#fff">
                                <tr>
                                    <th>Id</th>
                                    <th>Product Photo</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Order Date</th>
                                    <th>Total Amount</th>
                                </tr>
                                </thead>
                                <tbody style="font-size: 16px; background: rgb(190, 190, 190); color:rgb(24, 24, 24)">

                                    @foreach ($user_order as $user_orders)
                                        
                                    
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <img style="height: 50px" src="{{asset('uploads/product/'.App\Models\Product::find($user_orders->product_id)->product_photo)}}" alt="">
                                                </td>
                                            <td>{{App\Models\Product::find($user_orders->product_id)->product_name}}</td>
                                            <td>{{$sale_price = App\Models\Product::find($user_orders->product_id)->sale_price}}</td>
                                            <td>{{$quan = $user_orders->quantity}}</td>
                                            <td>{{$user_orders->created_at}}</td>
                                            <td>{{ ($quan * $sale_price) + 50 }}</td>

                                        </tr>
                                        @endforeach
                                    
                    
                                </tbody>
                            </table>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    
@endsection