@extends('master.frontend_main')

@section('frontend')

<section class="w-full bg-slate-200 py-4">
    <div class="container">
       <div class="row">
          <div class="flex">
             <h3 class="px-2"><a href="{{url('/')}}">Home</a></h3>
             <i class="fa-solid fa-angle-right px-2"></i>
             <h3 class="px-2"><a href="">Product Details</a></h3>

          </div>
          
       </div>
    </div>
   </section>


<section class="product_details section_space pb-0">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">
                <div class="product_details_image">
                    <img src="{{asset('uploads/product/'.$single_product->product_photo)}}" alt="">

                </div>
            </div>

            <div class="col-lg-6">
                <div class="product_details_content">
                    <h2 class="item_title">{{$single_product->product_name}}</h2>
                    <p>{{$single_product->short_desc}}</p>
                    <div class="item_review">
                        <ul class="rating_star ul_li">
                            <li><i class="fas fa-star"></i>&gt;</li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star-half-alt"></i></li>
                        </ul>
                        <span class="review_value">3 Rating(s)</span>
                    </div>

                    <div class="item_price">
                        <span>${{$single_product->sale_price}}</span>
                        <del>${{$single_product->main_price}}</del>
                    </div>
                    <hr>

                    <div class="item_attribute">
                        <form action="#">
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="select_option clearfix">
                                        <h4 class="input_title">Size *</h4>
                                        <select style="display: none;">
                                            <option data-display="- Please select -">Choose A Option</option>
                                            <option value="1">Some option</option>
                                            <option value="2">Another option</option>
                                            <option value="3" disabled="">A disabled option</option>
                                            <option value="4">Potato</option>
                                        </select><div class="nice-select" tabindex="0"><span class="current">- Please select -</span><ul class="list"><li data-value="Choose A Option" data-display="- Please select -" class="option selected">Choose A Option</li><li data-value="1" class="option">Some option</li><li data-value="2" class="option">Another option</li><li data-value="3" class="option disabled">A disabled option</li><li data-value="4" class="option">Potato</li></ul></div>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="select_option clearfix">
                                        <h4 class="input_title">Color *</h4>
                                        <select style="display: none;">
                                            <option data-display="- Please select -">Choose A Option</option>
                                            <option value="1">Some option</option>
                                            <option value="2">Another option</option>
                                            <option value="3" disabled="">A disabled option</option>
                                            <option value="4">Potato</option>
                                        </select><div class="nice-select" tabindex="0"><span class="current">- Please select -</span><ul class="list"><li data-value="Choose A Option" data-display="- Please select -" class="option selected">Choose A Option</li><li data-value="1" class="option">Some option</li><li data-value="2" class="option">Another option</li><li data-value="3" class="option disabled">A disabled option</li><li data-value="4" class="option">Potato</li></ul></div>
                                    </div>
                                </div>
                            </div>
                        </form></div>

                        <div class="quantity_wrap">
                            <div class="quantity_input">
                                <button type="button" class="input_number_decrement">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input class="input_number" type="text" value="1">
                                <button type="button" class="input_number_increment">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="total_price">Total: {{$single_product->sale_price}}</div>
                        </div>

                        <ul class="default_btns_group ul_li">
                            <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">   
                                @csrf 
                                <input type="hidden" name="product_id" value="{{$single_product->id}}">
                                <input type="hidden" name="product_name" value="{{$single_product->product_name}}">
                                <input type="hidden" name="sale_price" value="{{$single_product->sale_price}}">
                                <input type="hidden" name="quantity" value="{{$single_product->quantity}}">
                            <li><button class="btn btn_primary addtocart_btn" type="submit">Add To Cart</button></li>
                            </form>
                        </ul>
                    </div>
                
            </div>
        </div>

        <div class="details_information_tab">
            <ul class="tabs_nav nav ul_li" role="tablist">
                <li>
                    <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab" aria-controls="description_tab" aria-selected="true">
                    Description
                    </button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab" aria-controls="additional_information_tab" aria-selected="false">
                    Additional information
                    </button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab" aria-controls="reviews_tab" aria-selected="false">
                    Reviews(2)
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                    <p>{{$single_product->long_desc}}</p>
                    
                </div>

                <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                    <p>
                        {{$single_product->information}}
                    </p>

                    <div class="additional_info_list">
                        <h4 class="info_title">Additional Info</h4>
                        <ul class="ul_li_block">
                            <li>No Side Effects</li>
                            <li>Made in USA</li>
                        </ul>
                    </div>

                    <div class="additional_info_list">
                        <h4 class="info_title">Product Features Info</h4>
                        <ul class="ul_li_block">
                            <li>Compatible for indoor and outdoor use</li>
                            <li>Wide polypropylene shell seat for unrivalled comfort</li>
                            <li>Rust-resistant frame</li>
                            <li>Durable UV and weather-resistant construction</li>
                            <li>Shell seat features water draining recess</li>
                            <li>Shell and base are stackable for transport</li>
                            <li>Choice of monochrome finishes and colourways</li>
                            <li>Designed by Nagi</li>
                        </ul>
                    </div>
                </div>

                <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                    <div class="average_area">
                        <div class="row align-items-center">
                            <div class="col-md-12 order-last">
                                <div class="average_rating_text">
                                    <ul class="rating_star ul_li_center">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p class="mb-0">
                                    Average Star Rating: <span>4 out of 5</span> (2 vote)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="customer_reviews">
                        <h4 class="reviews_tab_title">2 reviews for this product</h4>
                        <div class="customer_review_item clearfix">
                            <div class="customer_image">
                                <img src="assets/images/team/team_1.jpg" alt="image_not_found">
                            </div>
                            <div class="customer_content">
                                <div class="customer_info">
                                    <ul class="rating_star ul_li">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star-half-alt"></i></li>
                                    </ul>
                                    <h4 class="customer_name">Aonathor troet</h4>
                                    <span class="comment_date">JUNE 2, 2021</span>
                                </div>
                                <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                            </div>
                        </div>

                        <div class="customer_review_item clearfix">
                            <div class="customer_image">
                                <img src="assets/images/team/team_2.jpg" alt="image_not_found">
                            </div>
                            <div class="customer_content">
                                <div class="customer_info">
                                    <ul class="rating_star ul_li">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star-half-alt"></i></li>
                                    </ul>
                                    <h4 class="customer_name">Danial obrain</h4>
                                    <span class="comment_date">JUNE 2, 2021</span>
                                </div>
                                <p class="mb-0">
                                Great product quality, Great Design and Great Service.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="customer_review_form">
                        <h4 class="reviews_tab_title">Add a review</h4>
                        <form action="#">
                            <div class="form_item">
                                <input type="text" name="name" placeholder="Your name*">
                            </div>
                            <div class="form_item">
                                <input type="email" name="email" placeholder="Your Email*">
                            </div>
                            <div class="your_ratings">
                                <h5>Your Ratings:</h5>
                                <button type="button"><i class="fal fa-star"></i></button>
                                <button type="button"><i class="fal fa-star"></i></button>
                                <button type="button"><i class="fal fa-star"></i></button>
                                <button type="button"><i class="fal fa-star"></i></button>
                                <button type="button"><i class="fal fa-star"></i></button>
                            </div>
                            <div class="form_item">
                                <textarea name="comment" placeholder="Your Review*"></textarea>
                            </div>
                            <button type="submit" class="btn btn_primary">Submit Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection