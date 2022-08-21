@extends('master.frontend_main')

@section('frontend')


        <section class="w-full bg-slate-200 py-4">
         <div class="container">
            <div class="row">
               <div class="flex">
                  <h3 class="px-2"><a href="{{url('/')}}">Home</a></h3>
                  <i class="fa-solid fa-angle-right px-2"></i>
                  <h3 class="px-2"><a href="{{route('cart.index')}}">Cart</a></h3>
                  <i class="fa-solid fa-angle-right px-2"></i>
                  <h3 class="px-2"><a href="{{route('checkout.index')}}">Checkout</a></h3>

               </div>
               
            </div>
         </div>
        </section>

        @if ($error_msg != "")
           <div class="alert alert-danger">
            {{$error_msg}}
           </div>
        @endif


        <section class="w-full bg-slate-200 py-2 mt-4">
         <div class="container">
            <div class="mt-4">
               <form action="#">
                  <div class="coupon_form form_item">
                      <input type="text" name="coupon" style="width: 300px" id="apply_coupon_input" placeholder="Coupon Code...">
                      <button type="button" id="apply_coupon_btn" class="btn btn_dark">Apply Coupon</button>
                      <div class="info_icon">
                          <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                      </div>
                  </div>
              </form>
            </div>
         </div>
        </section>


        <section class="mt-3">
            <div class="container bg-slate-100 w-full py-3">
               <form  method="POST"  action="{{route('order.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-3">
                     <div class="col-span-1 sm:col-span-1 md:col-span-2">
                        <h2 class="text-2xl ml-4 my-3">Building Details</h2>
                        <div class="grid grid-cols-1 gap-4 ml-4 md:grid-cols-2">
                           <div class="">
                              <label for="" class="text-sm font-bold">Full Name</label><br>
                              <input type="text" class="border w-full py-2 mt-1" value="{{old('full_name')}}" name="full_name" required>
                           </div>
                           <div class="">
                              <label for="" class="text-sm font-bold">Phone</label><br>
                              <input type="text" class="border w-full py-2 mt-1" name="phone" required>
                           </div>
                           <div class="">
                              <label for="" class="text-sm font-bold">Building / House No / Floor / Street</label><br>
                              <input type="text" class="border w-full py-2 mt-1" name="street">
                           </div>
                           <div class="">
                              <label for="" class="text-sm font-bold">Colony / Suburb / Locality / Landmark </label><br>
                              <input type="text" class="border w-full py-2 mt-1" name="locality">
                           </div>
                           
                           <div>
                              <label for="" class="text-sm font-bold">Country</label><br>
                              <select name="country" class="border w-full" id="" >
                                 <option value="">-----</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Pakisthan">Pakisthan</option>
                                 <option value="USA">USA</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Germany">Germany</option>
                              </select>
                           </div>
                           <div>
                              <label for="" class="text-sm font-bold">City</label><br>
                              <select name="city" class="border w-full" id="" >
                                 <option value="">-----</option>
                                 <option value="Dhaka">Dhaka</option>
                                 <option value="Rangpur">Rangpur</option>
                                 <option value="Rajshahi">Rajshahi</option>
                                 <option value="Chitagong">Chitagong</option>
                                 <option value="Barisal">Barisal</option>
                                 <option value="Khulna">Khulna</option>
                                 <option value="Sylhet">Sylhet</option>
                                 <option value="Mymansingh">Mymansingh</option>
                              </select>
                           </div>
                        </div>
                        <div class=" ml-4 mt-3">
                           <label for="" class="text-sm font-bold">Address</label><br>
                           <input type="text" class="border w-full py-2 mt-1" name="address">
                        </div>
                        <div class=" ml-4 mt-3">
                           <label for="" class="text-sm font-bold">Order Notes</label><br>
                           <input type="text" class="border w-full py-2 mt-1" name="other">
                        </div>
                        <div class="mt-4">
                           <form action="#">
                              <div class="coupon_form form_item">
                                  <input type="text" name="coupon" style="width: 300px" id="apply_coupon_input" placeholder="Coupon Code...">
                                  <button type="button" id="apply_coupon_btn" class="btn btn_dark">Apply Coupon</button>
                                  <div class="info_icon">
                                      <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                                  </div>
                              </div>
                          </form>
                        </div>
                     </div>
                     
                     
                     @php
                        $subtotal = 0;
                     @endphp
                     @foreach ($carts as $cart)
                        <input type="hidden" value="{{$sub_total = $cart['quantity'] * $cart['product']->sale_price}}">   
                           @php
                              $subtotal = $subtotal + $sub_total;
                           @endphp
                     @endforeach


                     <div class="col-span-1 px-5">
                        <h2 class="text-2xl mb-3 mt-3">Your Orders</h2>
                        <div class="border-1 rounded" style="border-color:rgb(193, 193, 193)">
                           <div class="justify-between flex p-2  border-b-2 border-slate-300">
                              <p class="text-base  font-bold">Subtotal</p>
                              <p class="text-base">${{$subtotal}}</p>
                              <input type="hidden" name="subtotal" value="{{$subtotal}}">
                           </div>
                           <div class="justify-between flex p-2  border-b-2 border-slate-300">
                              <p class="text-base  font-bold">Discount (%)</p>
                              <p  class="text-base">{{$discount_amount}}%</p>
                           </div>
                           <div class="justify-between flex p-2  border-b-2 border-slate-300">
                              <p class="text-base  font-bold">Discount Amount</p>
                              <p  class="text-base">${{$discount = ($subtotal*$discount_amount)/100}}</p>
                           </div>
                           <div class="justify-between flex p-2  border-b-2 border-slate-300">
                              <p class="text-base  font-bold">Delivery Charge</p>
                              <p  class="text-base">${{$delivery_charge = 50}}</p>
                              <input type="hidden" name="delivery_charge" value="{{$delivery_charge = 50}}">
                           </div>
                           <div class="justify-between flex p-2  border-b-2 border-slate-300">
                              <p class="text-base  font-bold">Total</p>
                              <p  class="text-base">${{$total = ($subtotal-$discount) + $delivery_charge}}</p>
                              <input type="hidden" name="total" value="{{$total}}">
                           </div>
                        </div>  

                        <div class="mt-16 bg-slate-300 py-4 px-2">
                           <div class="mb-3">
                              <input type="radio" name="payment_method" value="Cash On Delivery" id="">
                              <label for="" class="ml-3 text-base font-bold">Cash On Delivary</label>
                           </div>
                           <div class="mb-3">
                              <input type="radio" name="payment_method" value="SSL Commerz" id="">
                              <label for="" class="ml-3 text-base font-bold">SSL Commerz</label>
                           </div>
                           <div class="mb-3">
                              <input type="radio" name="payment_method" value="Stripe Payment" id="">
                              <label for="" class="ml-3 text-base font-bold">Stripe Payment</label>
                           </div>
                           
                        </div>
                        <div class="">
                           <button class="px-3 py-2 mt-3 bg-fuchsia-600 rounded text-white text-sm text-uppercase ">Place Order</button>
                        </div>
                     </div>
                     
                  </div>
               </form>
            </div>
        </section>



        

@endsection


@section('frontend_js')


<script>
    $(document).ready(function(){
        $("#apply_coupon_btn").click(function(){
            var apply_coupon_input = $('#apply_coupon_input').val();
            
            var coupon_name = "{{ url('/checkout/coupon') }}/"+apply_coupon_input;
            
            window.location.href = coupon_name;
            // alert(test);
        })
    })
</script>
    
@endsection