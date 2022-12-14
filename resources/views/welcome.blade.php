@extends('master.frontend_main')

@section('frontend')
@section('header_bottom')

<div class="header_bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col col-md-3">
                <div class="allcategories_dropdown">
                    <button class="allcategories_btn mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#allcategories_collapse" aria-expanded="false" aria-controls="allcategories_collapse">
                        <svg role="img" xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 24 24" aria-labelledby="statsIconTitle" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000"> <title id="statsIconTitle">Stats</title> <path d="M6 7L15 7M6 12L18 12M6 17L12 17"/> </svg>
                        Browse categories
                    </button>
                    <div class="allcategories_collapse" id="allcategories_collapse">
                        <div class="card card-body">
                            <ul class="allcategories_list ul_li_block">
                                @foreach (App\Models\Category::take(11)->get() as $category)
                                <li><a class="text-3xl" href="{{route('all.product',$category->id)}}"><i class="fa-solid fa-caret-right mr-5 text-2xl"></i> {{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-md-6">
                <nav class="main_menu navbar navbar-expand-lg">
                    <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                        <button type="button" class="offcanvas_close">
                            <i class="fal fa-times"></i>
                        </button>
                        <ul class="main_menu_list ul_li">
                            <li><a class="nav-link" href="#">Home</a></li>
                            <li><a class="nav-link" href="#">About us</a></li>
                            <li><a class="nav-link" href="#">Shop</a></li>
                            <li><a class="nav-link" href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="offcanvas_overlay"></div>
            </div>
            

            <div class="col col-md-3">
                <ul class="header_icons_group ul_li_right">
                     <li>
                        <a href="{{route('account')}}">Stowaa</a>
                    </li>
                    
                    <li>
                        <a href="{{route('account')}}">
                            <svg role="img" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" stroke="#051d43" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title id="personIconTitle">Person</title> <path d="M4,20 C4,17 8,17 10,15 C11,14 8,14 8,9 C8,5.667 9.333,4 12,4 C14.667,4 16,5.667 16,9 C16,14 13,14 14,15 C16,17 20,17 20,20"/> </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection
    <!-- main body - start
        ================================================== -->
        <main>
            
            <!-- sidebar cart - start
            ================================================== -->
            <div class="sidebar-menu-wrapper">
                <div class="cart_sidebar">
                    <button type="button" class="close_btn"><i class="fas fa-times"></i></button>
                    <ul class="cart_items_list ul_li_block mb_30 clearfix">
                        @php
                            $sub_total = 0;
                        @endphp
                        @forelse ($carts as $cart)
                        <li>
                            <div class="item_image">
                                <img src="{{asset('uploads/product/'.$cart['product']->product_photo)}}"  alt="image not found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">{{$cart['product']->product_name}}</h4>
                                <span class="item_price">${{$sale_price = $cart['product']->sale_price}}</span>
                            </div>
                            <form action="{{route('cart.destroy',$cart['product_id'])}}" method="post">
                                @csrf 
                                @method('delete')
                                <button type="submit" class="remove_btn" onclick="return confirm('Do you Want to Delete')"> 
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </li>
                        @php
                            $sub_total = $sub_total + $sale_price;
                        @endphp
                        @empty
                        <td colspan="50"><span class="text-danger mx-auto">No Data Available</span></td>
                        @endforelse
                    </ul>

                    <ul class="total_price ul_li_block mb_30 clearfix">
                        <li>
                            <span>Subtotal:</span>
                            <span>${{$sub_total}}</span>
                        </li>
                        <li>
                            <span>Vat 0%:</span>
                            <span>$0</span>
                        </li>
                        <li>
                            <span>Discount 0%:</span>
                            <span>- $0</span>
                        </li>
                        <li>
                            <span>Total:</span>
                            <span>${{$sub_total}}</span>
                        </li>
                    </ul>

                    <ul class="btns_group ul_li_block clearfix">
                        <li><a class="btn btn_primary" href="{{route('cart.index')}}">View Cart</a></li>
                        <li><a class="btn btn_secondary" href="{{route('checkout.index')}}">Checkout</a></li>
                    </ul>
                </div>

                <div class="cart_overlay"></div>
            </div>
            <!-- sidebar cart - end
            ================================================== -->

            
            <!-- product quick view modal - start
            ================================================== -->
            <div class="modal fade" id="quickview_popup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="product_details">
                                <div class="container">
                                    <div class="row">
                                        <div class="col col-lg-6">
                                            <div class="product_details_image p-0">
                                                <img src="{{asset('frontend/images/shop/product_img_12.png')}}" alt>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="product_details_content">
                                                <h2 class="item_title">Macbook Pro</h2>
                                                <p>
                                                    It is a long established fact that a reader will be distracted eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate
                                                </p>
                                                <div class="item_review">
                                                    <ul class="rating_star ul_li">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                    <span class="review_value">3 Rating(s)</span>
                                                </div>
                                                <div class="item_price">
                                                    <span>$620.00</span>
                                                    <del>$720.00</del>
                                                </div>
                                                <hr>
                                                <div class="item_attribute">
                                                    <h3 class="title_text">Options <span class="underline"></span></h3>
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col col-md-6">
                                                                <div class="select_option clearfix">
                                                                    <h4 class="input_title">Size *</h4>
                                                                    <select>
                                                                        <option data-display="- Please select -">Choose A Option</option>
                                                                        <option value="1">Some option</option>
                                                                        <option value="2">Another option</option>
                                                                        <option value="3" disabled>A disabled option</option>
                                                                        <option value="4">Potato</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <div class="select_option clearfix">
                                                                    <h4 class="input_title">Color *</h4>
                                                                    <select>
                                                                        <option data-display="- Please select -">Choose A Option</option>
                                                                        <option value="1">Some option</option>
                                                                        <option value="2">Another option</option>
                                                                        <option value="3" disabled>A disabled option</option>
                                                                        <option value="4">Potato</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="repuired_text">Repuired Fiields *</span>
                                                    </form>
                                                </div>
                                                
                                                <div class="quantity_wrap">
                                                    <form action="#">
                                                        <div class="quantity_input">
                                                            <button type="button" class="input_number_decrement">
                                                                <i class="fal fa-minus"></i>
                                                            </button>
                                                            <input class="input_number" type="text" value="1">
                                                            <button type="button" class="input_number_increment">
                                                                <i class="fal fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <div class="total_price">
                                                        Total: $620,99
                                                    </div>
                                                </div>
                                                
                                                <ul class="default_btns_group ul_li">
                                                    <li><a class="addtocart_btn" href="#!">Add To Cart</a></li>
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                    <li><a href="#!"><i class="fas fa-heart"></i></a></li>
                                                </ul>
                                                
                                                <ul class="default_share_links ul_li">
                                                    <li>
                                                        <a class="facebook" href="#!">
                                                            <span><i class="fab fa-facebook-square"></i> Like</span>
                                                            <small>10K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="twitter" href="#!">
                                                            <span><i class="fab fa-twitter-square"></i> Tweet</span>
                                                            <small>15K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="google" href="#!">
                                                            <span><i class="fab fa-google-plus-square"></i> Google+</span>
                                                            <small>20K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="share" href="#!">
                                                            <span><i class="fas fa-plus-square"></i> Share</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product quick view modal - end
            ================================================== -->

            
            <!-- slider_section - start
            ================================================== -->
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 offset-lg-3">
                            <div class="main_slider" data-slick='{"arrows": false}'>
                                @foreach (App\Models\Banner::all() as $banner)
                                <div class="slider_item set-bg-image" data-background="{{asset('storage/'.$banner->banner_photo)}}">
                                    <div class="slider_content">
                                        <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                                        <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">{{$banner->banner_title}} <span>Pressure monitor</span></h4>
                                        <p data-animation="fadeInUp2" data-delay=".6s">{{$banner->banner_short_desc}}</p>
                                        <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                            <del>${{$banner->banner_main_price}}</del>
                                            <span class="sale_price">${{$banner->banner_sale_price}}</span>
                                        </div>
                                        <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider_section - end
            ================================================== -->
            
            <!-- policy_section - start
            ================================================== -->
            <section class="policy_section">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="policy-wrap">
                                <div class="policy_item">
                                    <div class="item_icon">
                                        <i class="icon icon-Truck"></i>
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Free Shipping</h3>
                                        <p>
                                            Free shipping on all US order
                                        </p>
                                    </div>
                                </div>
        
                                <div class="policy_item">
                                    <div class="item_icon">
                                        <i class="icon icon-Headset"></i>
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">Support 24/ 7</h3>
                                        <p>
                                            Contact us 24 hours a day
                                        </p>
                                    </div>
                                </div>
        
                                <div class="policy_item">
                                    <div class="item_icon">
                                        <i class="icon icon-Wallet"></i>
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">100% Money Back</h3>
                                        <p>
                                            You have 30 days to Return
                                        </p>
                                    </div>
                                </div>
        
                                <div class="policy_item">
                                    <div class="item_icon">
                                        <i class="icon icon-Starship"></i>
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title">90 Days Return</h3>
                                        <p>
                                            If goods have problems
                                        </p>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- policy_section - end
            ================================================== -->
        
            
            <!-- products-with-sidebar-section - start
            ================================================== -->
            <section class="products-with-sidebar-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 ">
                            <div class="product-sidebar">
                                <div class="widget latest_product_carousel">
                                    <div class="title_wrap">
                                        <h3 class="area_title">Latest Category</h3>
                                        <div class="carousel_nav">
                                            <button type="button" class="vs4i_left_arrow"><i class="fas fa-angle-left"></i></button>
                                            <button type="button" class="vs4i_right_arrow"><i class="fas fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                    <div class="vertical_slider_4item" data-slick='{"dots": false}'>
                                        
                                        @foreach (App\Models\Category::all() as $categorys)
                                            
                                        <div class="slider_item">
                                            <div class="small_product_layout">
                                                <a class="item_image" href="{{route('all.product',$categorys->id)}}">
                                                    <img src="{{asset('uploads/category/'.$categorys->category_photo)}}" alt="image_not_found">
                                                </a>
                                                <div class="item_content">
                                                    <h3 class="item_title">
                                                        <a href="{{route('all.product',$categorys->id)}}">{{$categorys->category_name}}</a>
                                                    </h3>
                                                    <ul class="rating_star ul_li">
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                <div class="widget product-add">
                                    <div class="product-img">
                                        <img src="{{asset('frontend/images/shop/product_img_10.png')}}" alt>
                                    </div>
                                    <div class="details">
                                        <h4>iPad pro</h4>
                                        <p>iPad pro with M1 chipe</p>
                                        <a class="btn btn_primary" href="#" >Start Buying</a>
                                    </div>
                                </div>
                                <div class="widget audio-widget">
                                    <h5>Audio <span>5</span></h5>
                                    <ul>
                                        <li><a href="#">MI headphone</a></li>
                                        <li><a href="#">Bluetooth AirPods</a></li>
                                        <li><a href="#">Music system</a></li>
                                        <li><a href="#">JBL bar 5.1</a></li>
                                        <li><a href="#">Edifier Computer Speaker</a></li>
                                        <li><a href="#">Macbook pro</a></li>
                                        <li><a href="#">Men's watch</a></li>
                                        <li><a href="#">Washing metchin</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 ">
                            <div class="best-selling-products mb-4">
                                <div class="sec-title-link">
                                    <h3>Best selling</h3>
                                    <div class="view-all"><a href="#">View all<i class="fa fa-long-arrow-right"></i></a></div>
                                </div>
                                <div class="product-area clearfix">

                                    <div class="row py-2">
                                        @foreach (App\Models\Product::take(6)->get() as $products)
                                        <div class="col-lg-4 " style="margin-bottom: 3rem">
                                            <div class="p-3 " style="background-color: #fff;border:1px solid #e5e8ec">
                                                <div class="product-pic">
                                                    <img style="height: 170px!important" src="{{asset('uploads/product/'.$products->product_photo)}}" width="220" alt>
                                                    <div class="actions">
                                                        <ul>
                                                            <li>
                                                                <a href="#" class="d-flex justify-center items-center"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24"  stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"/> </svg></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="d-flex justify-center items-center"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24"  stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"/> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"/> <path d="M19 4L22 7L19 10"/> <path d="M19 13L22 16L19 19"/> </svg></a>
                                                            </li>
                                                            <li>
                                                                <a class="d-flex justify-center items-center" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"/> <circle cx="12" cy="12" r="3"/> </svg></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="details">
                                                    <h4><a href="{{route('product.details',$products->id)}}" target="_blank">{{$products->product_name}}</a></h4>
                                                    <p><a href="#">{{$products->short_desc}}</a></p>
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </div>
                                                    <span class="price">
                                                        <ins>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <bdi>
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>{{$products->sale_price}}
                                                                </bdi>
                                                            </span>
                                                        </ins>
                                                    </span>
                                                <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">   
                                                    @csrf 
                                                    <input type="hidden" name="product_id" value="{{$products->id}}">
                                                    <input type="hidden" name="product_name" value="{{$products->product_name}}">
                                                    <input type="hidden" name="sale_price" value="{{$products->sale_price}}">
                                                    <input type="hidden" name="quantity" value="{{$products->quantity}}">
                                                    <div class="add-cart-area">
                                                        <button class="add-to-cart">Add to cart</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                   
                                </div>
                            </div>
                            
                            <div class="top_category_wrap mt-6">
                                <div class="sec-title-link">
                                    <h3>Top categories</h3>
                                </div>
                                <div class="top_category_carousel2" data-slick='{"dots": false}'>
                                    @foreach(App\Models\Category::all() as $cate)
                                    
                                    <div class="slider_item">
                                        <div class="category_boxed">
                                            <a href="{{route('all.product',$cate->id)}}">
                                                  <span class="item_image">
                                                      <img src="{{asset('uploads/category/'.$cate->category_photo)}}" alt="image_not_found">
                                                  </span>
                                                <span class="item_title">{{$cate->category_name}}</span>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="carousel_nav carousel-nav-top-right">
                                    <button type="button" class="tc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                                    <button type="button" class="tc_right_arrow"><i class="fal fa-long-arrow-alt-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container  -->
            </section>
            <!-- products-with-sidebar-section - end
            ================================================== -->
            
            
            <!-- promotion_section - start
            ================================================== -->
            <section class="promotion_section">
                <div class="container">
                    <div class="row promotion_banner_wrap">
                        <div class="col col-lg-6">
                            <div class="promotion_banner">
                                <div class="item_image">
                                    <img src="{{asset('frontend/images/promotion/banner_img_1.png')}}" alt>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">Protective sleeves <span>combo.</span></h3>
                                    <p>It is a long established fact that a reader will be distracted</p>
                                    <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col col-lg-6">
                            <div class="promotion_banner">
                                <div class="item_image">
                                    <img src="{{asset('frontend/images/promotion/banner_img_2.png')}}" alt>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">Nutrillet blender <span>combo.</span></h3>
                                    <p>
                                        It is a long established fact that a reader will be distracted
                                    </p>
                                    <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- promotion_section - end
            ================================================== -->
            
            <!-- new_arrivals_section - start
            ================================================== -->
            <section class="new_arrivals_section section_space">
                <div class="container">
                    <div class="sec-title-link">
                        <h3>New Arrivals</h3>
                    </div>
                    
                    <div class="row newarrivals_products">
                        <div class="col col-lg-5">
                            <div class="deals_product_layout1">
                                <div class="bg_area">
                                    <h3 class="item_title">Best <span>Product</span> Deals</h3>
                                    <p>
                                        Get a 20% Cashback when buying TWS Product From SoundPro Audio Technology.
                                    </p>
                                    <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col col-lg-7">
                            <div class="new-arrivals-grids clearfix">
                                <div class="row">
                                @foreach(App\Models\Product::take(4)->orderBy('id','Desc')->get() as $prod)
                                
                                <div class="col-lg-6 mt-6 p-4">
                                    <div class="product-pic">
                                        <img style="height: 180px!important" src="{{asset('uploads/product/'.$prod->product_photo)}}" alt>
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="#" class="d-flex justify-center items-center"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"/> </svg></a>
                                                </li>

                                                <li>
                                                    <a href="#" class="d-flex justify-center items-center"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"/> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"/> <path d="M19 4L22 7L19 10"/> <path d="M19 13L22 16L19 19"/> </svg></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="d-flex justify-center items-center"><svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"/> <circle cx="12" cy="12" r="3"/> </svg></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h4><a href="{{route('product.details',$products->id)}}" target="_blank">{{$prod->product_name}}</a></h4>
                                        <p><a href="#">{{ \Illuminate\Support\Str::limit($prod->short_desc, 40, $end='...') }}
                                        </a></p>
                                        <span class="price">
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol">$</span>{{$prod->sale_price}}
                                                    </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">   
                                                    @csrf 
                                                    <input type="hidden" name="product_id" value="{{$prod->id}}">
                                                    <input type="hidden" name="product_name" value="{{$prod->product_name}}">
                                                    <input type="hidden" name="sale_price" value="{{$prod->sale_price}}">
                                                    <input type="hidden" name="quantity" value="{{$prod->quantity}}">
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- new_arrivals_section - end
            ================================================== -->
            
            <!-- brand_section - start
            ================================================== -->
            <div class="brand_section pb-0">
                <div class="container">
                    <div class="brand_carousel">
                        <div class="slider_item">
                            <a class="product_brand_logo" href="#!">
                                <img src="{{asset('frontend/images/brand/brand_1.png')}}" alt="image_not_found">
                                <img src="{{asset('frontend/images/brand/brand_1.png')}}" alt="image_not_found">
                            </a>
                        </div>
                        <div class="slider_item">
                            <a class="product_brand_logo" href="#!">
                                <img src="{{asset('frontend/images/brand/brand_2.png')}}" alt="image_not_found">
                                <img src="{{asset('frontend/images/brand/brand_2.png')}}" alt="image_not_found">
                            </a>
                        </div>
                        <div class="slider_item">
                            <a class="product_brand_logo" href="#!">
                                <img src="{{asset('frontend/images/brand/brand_3.png')}}" alt="image_not_found">
                                <img src="{{asset('frontend/images/brand/brand_3.png')}}" alt="image_not_found">
                            </a>
                        </div>
                        <div class="slider_item">
                            <a class="product_brand_logo" href="#!">
                                <img src="{{asset('frontend/images/brand/brand_4.png')}}" alt="image_not_found">
                                <img src="{{asset('frontend/images/brand/brand_4.png')}}" alt="image_not_found">
                            </a>
                        </div>
                        <div class="slider_item">
                            <a class="product_brand_logo" href="#!">
                                <img src="{{asset('frontend/images/brand/brand_5.png')}}" alt="image_not_found">
                                <img src="{{asset('frontend/images/brand/brand_5.png')}}" alt="image_not_found">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand_section - end
            ================================================== -->
            
            <!-- viewed_products_section - start
            ================================================== -->
            <section class="viewed_products_section section_space">
                <div class="container">
                    
                    <div class="sec-title-link mb-0">
                        <h3>Recently Viewed Products</h3>
                    </div>
                       <div class="row">

                        @foreach ($ProductCategorys as $categor)
                          <div class="col-lg-4">
                            <div class="viewed_product_item">
                                <div class="item_image">
                                    <img style="height: 150px" src="{{asset('uploads/category/'.$categor->category_photo)}}" alt="image_not_found">
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">{{$categor->category_name??''}}</h3>
                              
                                    <ul class="ul_li_block">
                                        @foreach ( $categor->subcategory as $subs)
                                        <li><a href="#!">{{ $subs->subcategory_name??''}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                          </div>
                          @endforeach

                          
                       </div>


               
                </div>
            </section>
            <!-- viewed_products_section - end
            ================================================== -->

            
            <!-- newsletter_section - start
            ================================================== -->
            <section class="newsletter_section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-lg-6">
                            <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                            <p>Get E-mail updates about our latest products and special offers.</p>
                        </div>
                        <div class="col col-lg-6">
                            <form action="#!">
                                <div class="newsletter_form">
                                    <input type="email" name="email" placeholder="Enter your email address">
                                    <button type="submit" class="btn btn_secondary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- newsletter_section - end
            ================================================== -->
        
        </main>
        <!-- main body - end
        ================================================== -->
@endsection








