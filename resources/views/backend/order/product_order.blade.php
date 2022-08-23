@extends('master.dashboard_main')


@section('dashboard')
@can('author')

    {{-- <div class="container">
        <div class="row">
            <table class="table table-hover" id="data_table">
                <thead class=" bg-success ">
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Product Photo</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                    <th>Date</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($product_orders->product_order as $order)
                    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{App\Models\Order::find($order->order_id)->full_name}}</td>
                        <td>{{App\Models\Product::find($order->product_id)->product_name}}</td>
                        <td>
                            <img  src="{{asset('uploads/product/'.App\Models\Product::find($order->product_id)->product_photo)}}" style="height: 50px" alt="">
                            </td>
                        <td>{{$sale_price = App\Models\Product::find($order->product_id)->sale_price}}</td>
                        <td>{{$quantity = $order->quantity}}</td>
                        <td>{{$sale_price*$quantity}}</td>

                        <td>{{$order->created_at}}</td>
                    </tr>
                            
                    @endforeach

                </tbody>
            </table>
        </div>
    </div> --}}




    <section>
        <div class="mx-auto flex justify-between border-y border-gray-400 bg-gray-200 ">
          <ul>
            <li><img class="md:ml-12" height="50px" width="100px" src="https://www.mmitsoft.com/wp-content/uploads/2020/12/mmit-soft-logo.png" alt="" /></li>
          </ul>
          <ul class="flex text-sky-700 sm:mr-2 py-4">
            <li class="mr-4 border-r-2 border-gray-100 pr-3">
              <a onclick="window.print()" class="cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
              </svg></a>
            </li>
            <li class="">
              <ul>
                <li><span>Invoice </span><span class="text-red-500">#121212</span></li>
                <li><span>Date : </span><span class="text-red-500"><?php echo "" . date("d:m:Y"); ?></span></li>
              </ul>
            </li>
          </ul>
        </div>
      </section>
      
      <section class="mt-4">
        <div class="container mx-auto w-full">
          <div class="grid gap-2 text-center md:grid-cols-2">
            <div>
              <div class="text-dark block rounded bg-gray-200 py-1">Company Info</div>
              <ul class="md:ml-6">
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span> MMIT Soft Ltd</span>
                </li>
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span> Jhigatola, Dhanmondi</span>
                </li>
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span> Dhaka, Bangladesh</span>
                </li>
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span> Phone: 111-111-111</span>
                </li>
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span> Paymant Info</span>
                </li>
              </ul>
            </div>
      
            <div>
   {{-- @php 
     $datas=App\Models\Order::find(Route::current()->parameter('order'))
   @endphp --}}
         
              <div class="block rounded bg-gray-400 py-1 text-white">Customar Info</div>
              <ul class="md:ml-6">
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span>{{$product_orders->full_name}}</span>
                </li>
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span>{{$product_orders->locality}} , {{ $product_orders->address }}</span>
                </li>
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span>{{$product_orders->city}} , {{ $product_orders->country }}</span>
                </li>
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span> Phone: {{$product_orders->phone}}</span>
                </li>
                <li class="mt-1 flex">
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
                  <span> Order date : {{$product_orders->created_at}}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      
      <section class="mt-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-left text-sm text-gray-500 ">
            <thead class="uppercase text-white bg-gray-400">
              <tr>
                <th class="py-3 px-6">#</th>
                <th class="py-3 px-6">Product Name</th>
                <th class="py-3 px-6">Photo</th>
                <th class="py-3 px-6">Sale Price</th>
                <th class="py-3 px-6">Quantity</th>
                <th class="py-3 px-6">Total Price</th>
              </tr>
            </thead>
            <tbody>
             

            @php
              $subtotal = 0
            @endphp

              @foreach ($product_orders->product_order as  $product)
              <tr class="">
                <td class="py-4 px-6">{{$loop->iteration}}</td>
                <th scope="row" class="whitespace-nowrap py-4 px-6 font-medium">{{$product->product->product_name??''}}</th>
                <td class="py-4 px-6">
                  <img style="height: 70px" src="{{asset('uploads/product/'.$product->product->product_photo)}}" alt="">
                </td>
                <td class="py-4 px-6">{{$sale_price = $product->product->sale_price}}</td>
                <td class="py-4 px-6">{{$quantity = $product->quantity}}</td>
                <td class="py-4 px-6">{{$sub_total = $sale_price * $quantity}}</td>

                <input type="hidden" value="{{$subtotal = $subtotal + $sub_total}}">
                
              </tr>
              @endforeach
             
            </tbody>
          </table>
        </div>
      </section>
      
      <div class="mt-3 mb-1 w-full bg-orange-500" style="height:1px"></div>
      <div class="mb-3 w-full bg-green-500" style="height:1px"></div>
      


      <section class="mt-6">
        <div class="flex">
          <ul class="px-20 py-10 bg-gray-100 ">
            <li class="text-lg font-bold mt-1"><span>Sub Total : </span><span> $ {{$subtotal}}</span></li>
            <li class="text-lg font-bold mt-1"><span>Delivary Charge : </span><span> $ {{$delivary_charge = 50}}</span></li>
            <li class="text-lg font-bold mt-1 mb-2"><span>Discount :</span><span> {{$discount = $product_orders->discount_amount}} %</span></li>
            <div style="padding: 1px 0" class=" bg-gray-500"></div>
            <li class="text-2xl font-bold mt-2"><span>Total Amount :</span><span> $ {{round($subtotal - (($subtotal * $discount)/100)+$delivary_charge),2}}</span></li>

          </ul>
        </div>
      </section>



      {{-- <section class="">
        <div class="inline-block   bg-gray-300">
        <ul class="flex justify-between">
          <li></li>
          <li class="font-bold">
            <div class="mr-12"><span>Total Price </span>:<span class="text-red-500"></span></div>
          </li>
        </ul>
      </div>
      </section> --}}
      
      <section class="mt-10">
        <div class="rounded bg-gray-200 p-3 md:mx-6">
          <span>Thank you for choosing ~MMIT Soft Company~ <span class="opacity-0 sm:opacity-100">We believe you will be satisfied by our services.</span></span>
        </div>
      </section>

@endcan
@endsection