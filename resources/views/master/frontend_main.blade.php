<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Stowaa Commerce</title>
    <link rel="shortcut icon" href="{{asset('frontend/images/logo/favourite_icon_1.png')}}">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">

    <!-- icon font - css include -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/stroke-gap-icons.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/fontawesome.css')}}">

    <!-- animation - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/animate.css')}}">

    <!-- carousel - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick-theme.css')}}">

    <!-- popup - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/magnific-popup.css')}}">

    <!-- jquery-ui - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/jquery-ui.css')}}">

    <!-- select option - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/nice-select.css')}}">

    <!-- woocommercen - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/woocommerce.css')}}">

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">

    @yield('ckeditor')
    
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css" integrity="sha512-uHuCigcmv3ByTqBQQEwngXWk7E/NaPYP+CFglpkXPnRQbSubJmEENgh+itRDYbWV0fUZmUz7fD/+JDdeQFD5+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <!-- body_wrap - start -->
    <div class="body_wrap">
        
        <!-- backtotop - start -->
        <div class="backtotop">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>
        <!-- backtotop - end -->
        <!-- header_section - start
        ================================================== -->
        <header class="header_section header-style-no-collapse">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-md-6">
                            <ul class="header_select_options ul_li">
                                <li>
                                    <div class="select_option">
                                        <div class="flug_wrap">
                                            <img src="{{asset('frontend/images/flug/flug_uk.png')}}" alt="image_not_found">
                                        </div>
                                        <select>
                                            <option data-display="Select Option">Select Your Language</option>
                                            <option value="1" selected>English</option>
                                            <option value="2">Bangla</option>
                                            <option value="3" disabled>Arabic</option>
                                            <option value="4">Hebrew</option>
                                        </select>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="col col-md-6">
                            <p class="header_hotline"><strong><a href="{{route('login')}}">Log In</a></strong> | <strong><a href="{{route('register')}}"> Sign Up</a></strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-lg-3 col-md-3 col-sm-12">
                            <div class="brand_logo">
                                <a class="brand_link" href="{{url('/')}}">
                                    <img src="{{asset('frontend/images/logo/logo_1x.png')}}" srcset="{{asset('frontend/images/logo/logo_2x.png 2x')}}" alt>
                                </a>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-6 col-sm-12">
                            <form action="#">
                                <div class="advance_serach">
                                    <div class="select_option mb-0 clearfix">
                                        <select>
                                            <option data-display="All Categories">Select A Category</option>
                                            <option value="1">New Arrival Products</option>
                                            <option value="2">Most Popular Products</option>
                                            <option value="3">Deals of the day</option>
                                            <option value="4">Mobile Accessories</option>
                                            <option value="5">Computer Accessories</option>
                                            <option value="6">Consumer Electronics</option>
                                            <option value="7">Automobiles & Motorcycles</option>
                                        </select>
                                    </div>
                                    <div class="form_item">
                                        <input type="search" name="search" placeholder="Search Prudcts...">
                                        <button type="submit" class="search_btn"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col col-lg-3 col-md-3 col-sm-12">
                            <button class="mobile_menu_btn2 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu_dropdown" aria-controls="main_menu_dropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fal fa-bars"></i>
                            </button>
                            <button type="button" class="cart_btn">
                               <ul class="header_icons_group ul_li_right">
                                    <li>
                                        <a href="wishlist.html">
                                            <svg role="img" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" stroke="#051d43" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"/> </svg>
                                            <span class="wishlist_counter">3</span>
                                        </a>
                                    </li>
                                    <li>
                                        <span class="cart_icon">
                                            <i class="icon icon-ShoppingCart"></i>
                                            <small class="cart_counter">@if(Session::has('cart')){{count(Session::get('cart'))}}@else 0 @endif</small>
                                        </span>
                                    </li>
                               </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

          @yield('header_bottom')

            
        </header>
        <!-- header_section - end
        ================================================== -->
        
        @yield('frontend')
        
        <!-- footer_section - start
        ================================================== -->
        <footer class="footer_section">
            <div class="footer_widget_area">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-6 col-sm-6">
                            <div class="footer_widget footer_about">
                                <div class="brand_logo">
                                    <a class="brand_link" href="index.html">
                                        <img src="{{asset('frontend/images/logo/logo_1x.png')}}" srcset="{{asset('frontend/images/logo/logo_2x.png 2x')}}" alt="logo_not_found">
                                    </a>
                                </div>
                                <ul class="social_round ul_li">
                                    <li class=""><a href="#!" class="d-flex justify-center items-center"><i class="fa-brands fa-youtube "></i></a></li>
                                    <li><a href="#!" class="d-flex justify-center items-center"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#!" class="d-flex justify-center items-center"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#!" class="d-flex justify-center items-center"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a href="#!" class="d-flex justify-center items-center"><i class="fa-brands fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col col-lg-2 col-md-3 col-sm-6">
                            <div class="footer_widget footer_useful_links">
                                <h3 class="footer_widget_title text-uppercase">Quick Links</h3>
                                <ul class="ul_li_block">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Sign Up</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col col-lg-2 col-md-3 col-sm-6">
                            <div class="footer_widget footer_useful_links">
                                <h3 class="footer_widget_title text-uppercase">Custom area</h3>
                                <ul class="ul_li_block">
                                    <li><a href="#!">My Account</a></li>
                                    <li><a href="{{route('order.index')}}">Orders</a></li>
                                    <li><a href="#!">Team</a></li>
                                    <li><a href="#!">Privacy Policy</a></li>
                                    <li><a href="#!">My Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col col-lg-4 col-md-6 col-sm-6">
                            <div class="footer_widget footer_contact">
                                <h3 class="footer_widget_title text-uppercase">Contact Onfo</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                                </p>
                                <div class="hotline_wrap">
                                    <div class="footer_hotline">
                                        <div class="item_icon">
                                            <i class="fa-solid fa-circle-question"></i>
                                        </div>
                                        <div class="item_content">
                                            <h4 class="item_title">Have any question?</h4>
                                            <span class="hotline_number">+ 123 456 7890</span>
                                        </div>
                                    </div>
                                    <div class="livechat_btn clearfix">
                                        <a class="btn border_primary" href="#!">Live Chat</a>
                                    </div>
                                </div>
                                <ul class="store_btns_group ul_li">
                                    <li><a href="#!"><img src="{{asset('frontend/images/app_store.png')}}" alt="app_store"></a></li>
                                    <li><a href="#!"><img src="{{asset('frontend/images/play_store.png')}}" alt="play_store"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col col-md-6">
                            <p class="copyright_text">
                                ©2021 <a href="#!">stowaa</a>. All Rights Reserved.
                            </p>
                        </div>
                        
                        <div class="col col-md-6">
                            <div class="payment_method">
                                <h4>Payment:</h4>
                                <img src="{{asset('frontend/images/payments_icon.png')}}" alt="image_not_found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer_section - end
        ================================================== -->

    </div>
    <!-- body_wrap - end -->

    <!-- fraimwork - jquery include -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

    <!-- carousel - jquery plugins collection -->
    <script src="{{asset('frontend/js/jquery-plugins-collection.js')}}"></script>

    <!-- google map  -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
    <script src="{{asset('frontend/js/gmaps.min.js')}}"></script>

    <!-- custom - main-js -->
    <script src="{{asset('frontend/js/main.js')}}"></script>

    {{-- font awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>

    @yield('frontend_js')
    
</body>
</html>