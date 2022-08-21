@extends('master.frontend_main')
<style>
    .cart-delete-btn:hover{
        background-color: green;
    }
</style>
@section('frontend')
<section class="w-full bg-slate-200 py-4">
    <div class="container">
       <div class="row">
          <div class="flex">
            <h3 class="px-2"><a href="{{url('/')}}">Home</a></h3>
             <i class="fa-solid fa-angle-right px-2"></i>
             <h3 class="px-2"><a href="">Cart</a></h3>

          </div>
          
       </div>
    </div>
   </section>

  

            <!-- cart_section - start
            ================================================== -->
            <section class="cart_section section_space">
                <div class="container">

                    <div class="cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Sub Total</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sub_total = 0;
                                @endphp
                                @foreach ($carts as $cart)

                                <tr>
                                    <td>
                                        <div class="cart_product">
                                            <img src="{{asset('uploads/product/'.$cart['product']->product_photo)}}"  alt="image not found">
                                            <h3><a href="shop_details.html">{{$cart['product']->product_name}}</a></h3>
                                        </div>
                                    </td>
                                    <td class="text-center"><span class="price_text">${{$cart['product']->sale_price}}</span></td>
                                    <td class="text-center">
                                        <form action="{{route('cart.update',$cart['product_id'])}}" method="POST" id="form">
                                            @csrf()
                                            @method('put')
                                            <div class="quantity_input">
                                                <form action="{{route('cart.update',$cart['product_id'])}}" id="form" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="button" class="" name="quantity" onclick="form.submit()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    
                                                    <input class="input_number" type="number" onclick="form.submit()" name="quantity"  min="1" value="{{$cart['quantity']}}" />
                                                    
                                                
                                                    <button type="button" class="" name="quantity" onclick="form.submit()">
                                                        <i class="fal fa-plus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center"><span class="price_text">${{$subtotal = $cart['quantity']*$cart['product']->sale_price}}</span></td>
                                    @php
                                        $sub_total = $sub_total + $subtotal;
                                    @endphp
                                    <td class="text-center">
                                        <form action="{{route('cart.destroy',$cart['product_id'])}}" method="post">
                                            @csrf 
                                            @method('delete')
                                            <button type="submit" class="remove_btn" onclick="return confirm('Do you Want to Delete')"> 
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="cart_btns_wrap">
                        <div class="row">
                            <div class="col col-lg-6">
                                <form action="#">
                                    <div class="coupon_form form_item mb-0">
                                        <input type="text" name="coupon" value="" id="apply_coupon_input" placeholder="Coupon Code...">
                                        <button type="button" id="apply_coupon_btn" class="btn btn_dark">Apply Coupon</button>
                                        <div class="info_icon">
                                            <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                                        </div>
                                            
                                    </div>
                                </form>
                            </div>

                            <div class="col col-lg-6">
                                <ul class="btns_group ul_li_right">
                                    {{-- <li><a class="btn border_black" href="#!">Update Cart</a></li> --}}
                                    <li><a class="btn btn_dark" href="{{route('checkout.index')}}">Prceed To Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="calculate_shipping">
                                <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span></h3>
                                <form action="#">
                                    <div class="select_option clearfix">
                                        <select>
                                            <option value="">Select Your Option</option>
                                            <option value="1">Inside City</option>
                                            <option value="2">Outside City</option>
                                        </select>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                                </form>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="cart_total_table">
                                <h3 class="wrap_title">Cart Totals</h3>
                                <ul class="ul_li_block">
                                    <li>
                                        <span>Cart Subtotal</span>
                                        <span>${{$sub_total}}</span>
                                    </li>
                                    <li>
                                        <span>Discount Amount (%)</span>
                                        <span>{{$discount_amount}} %</span>
                                    </li>
                                    <li>
                                        <span>Total Discount Amount</span>
                                        <span>{{$real_amount = ($sub_total * $discount_amount)/100}}</span>
                                    </li>
                                    <li>
                                        <span>Delivery Charge</span>
                                        <span>${{$delivery_charge = 50}}</span>
                                    </li>
                                    <li>
                                        <span>Total Amount</span>
                                        <span class="total_price">${{($sub_total-$real_amount)+$delivery_charge}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cart_section - end
            ================================================== -->

@endsection



@section('frontend_js')

{{-- <script>
    $(document).ready(function(){
        alert("apply_coupon_input");
        $('#apply_coupon_btn').click(function(){
            var apply_coupon_input = $('$apply_coupon_input').val();
            alert(apply_coupon_input);
        });
    });
</script> --}}

<script>
    $(document).ready(function(){
        $("#apply_coupon_btn").click(function(){
            var apply_coupon_input = $('#apply_coupon_input').val();
            
            var coupon_name = "{{ url('/cart/coupon') }}/"+apply_coupon_input;
            
            window.location.href = coupon_name;
            // alert(test);
        })
    })
</script>
    
@endsection