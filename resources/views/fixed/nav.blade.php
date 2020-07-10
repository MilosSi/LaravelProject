<div class="main-wrapper main-wrapper-2 main-wrapper-3">
    <header class="header-area">
        <div class="main-header-wrap bg-gray">
            <div class="custom-container">
                <div class="header-top pt-10 pb-10">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="header-info header-info-inc">
                                <a href="tel:+38113456789">(381) +123456789</a>
                                <a href="mailto:info@cactus.com">info@cactus.com</a>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <div class="header-info header-info-inc">
                                <p>Keep it simple</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-header-outer">
                <div class="intelligent-header bg-white">
                    <div class="header-middle">
                        <div class="custom-container">
                            <div class="row align-items-center">
                                <div class="col-xl-2 col-lg-3">
                                    <div class="logo">
                                        <a href="/"><img src="{{asset('assets/images/logo/logo.png')}}" alt="logo" style="width: 50%;height: 50%"></a>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-6 position-static">
                                    <div class="main-menu menu-lh-3 main-menu-blod main-menu-center">
                                        <nav>
                                            <ul>
                                                <li><a class="active" href="/">Home</a></li>
                                                <li class="position-static"><a href="#">Shop</a>
                                                    <ul class="mega-menu mega-menu-width3">
                                                        <li>
                                                            <ul class="mega-menu-width4">
                                                                @foreach($menuGender as $mg)
                                                                <li><a class="menu-title" href="/shop/{{$mg->id}}"><span>{{$mg->gender_name}}`s Products</span> </a>
                                                                   <p style="padding: 7px 15px;">{{$mg->gender_desc}}</p>
                                                                </li>
                                                                @endforeach
                                                                <li><a class="menu-title" href="#"><span>Shop Page</span></a>
                                                                    <ul>

                                                                        @if(session()->has('user'))
                                                                            <li><a href="/myaccount"><span>My Account</span></a></li>
                                                                        @else
                                                                            <li><a href="/loginregister"><span>login/register</span></a></li>
                                                                        @endif
                                                                            <li><a href="/allproducts"><span>All products</span></a></li>
                                                                        <li><a href="/cart"><span>Shopping Cart</span></a></li>
                                                                        <li><a href="/wishlist"><span>Wish List</span></a></li>
{{--                                                                        <li><a href="compare.html"><span>Compare</span></a></li>--}}


                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <ul class="mega-menu-width4 mega-menu-mrg-top">
                                                                @foreach($menuCollection as $mc)
                                                                <li class="menu-banner-wrap banner-hover" style="height: 200px;"><a href="/collections/{{$mc->col_id}}"><img src="{{asset("assets/images/collections/$mc->pic_path")}}" alt="{{$mc->pic_alt}}"></a>
                                                                    <div class="menu-banner-content">
                                                                        <span>#Latest collections</span>
                                                                        <h2 style="color: #000;font-size: 42px;">{{$mc->col_name}}</h2>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Pages</a>
                                                    <ul class="sub-menu-width">
                                                        <li><a href="/aboutus"><span>About Us</span> </a></li>
                                                        <li><a href="/ourteam"><span>Our Team</span></a></li>
                                                        <li><a href="/contactus"><span>Contact Us</span></a></li>
                                                    </ul>
                                                </li>
{{--                                                <li><a href="index-8.html">Gallery <span class="tip-arrow">hot</span></a></li>--}}

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3">
                                    <div class="header-component-wrap">
                                        <div class="header-search-2 component-same">
                                            <a class="search-active" href="#"><i class="dl-icon-search10"></i></a>
                                        </div>
                                        <div class="header-login component-same ml-30">
                                            @if(session()->has('user'))
                                                <a href="/myaccount"><i class="dl-icon-user12"></i><span>{{session('user')->username}}</span></a>
                                            @else
                                                <a href="/loginregister"><i class="dl-icon-user12"></i><span>Sign In</span></a>
                                            @endif


                                        </div>
                                        <div class="cart-wrap component-same ml-10">
                                            <a href="#" class="cart-active">
                                                <i class="dl-icon-cart1"></i>
                                                <span class="count-style cartnumber"></span>
                                            </a>
                                        </div>
                                        <div class="quick-info component-same ml-20">
                                            <a href="#" class="quick-info-active">
                                                <i class="dl-icon-menu1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-small-mobile">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo logo-width">
                            <a href="index.html">
                                <img alt="" src="{{asset("assets/images/logo/logo.png")}}" style="width: 50%;height: 50%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mobile-header-right-wrap">
                            <div class="same-style cart-wrap">
                                <a href="#" class="cart-active">
                                    <i class="dl-icon-cart1 "></i>
                                    <span class="count-style cartnumber"></span>
                                </a>
                            </div>
                            <div class="mobile-off-canvas">
                                <a class="mobile-aside-button" href="#"><i class="dl-icon-menu2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-off-canvas-active">
        <a class="mobile-aside-close"><i class="dl-icon-close"></i></a>
        <div class="header-mobile-aside-wrap">
            <div class="mobile-search">
                <form class="search-form" action="#">
                    <input type="text" placeholder="Search entire store…">
                    <button class="button-search"><i class="dl-icon-search10"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap">
                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="/">Home</a>

                            </li>
                            <li class="menu-item-has-children "><a href="javascript:void(0)">shop</a>
                                <ul class="dropdown">

                                        <li class="menu-item-has-children"><a href="#">Products</a>
                                        <ul class="dropdown">
                                            @foreach(@$menuGender as $mmg)
                                            <li><a href="/shop/{{$mmg->id}}">{{$mmg->gender_name}}`s Products</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="/aboutus">About Us </a></li>
                                    <li><a href="/ourteam">Our Team</a></li>
                                    <li><a href="/contactus">Contact Us</a></li>
                                </ul>
                            </li>
{{--                            <li><a href="index-8.html">Gallery </a></li>--}}
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-curr-lang-wrap">
                <div class="single-mobile-curr-lang">
                    <a class="mobile-account-active" href="#">My Account <i class="fa fa-angle-down"></i></a>
                    <div class="lang-curr-dropdown account-dropdown-active">
                        <ul>
                            @if(session()->has('user'))
                                <li><a href="/myaccount">My Account</a></li>
                            @else
                                <li><a href="/loginregister">Login</a></li>
                                <li><a href="/loginregister">Create Account</a></li>
                            @endif



                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-quick-info">
                <ul>
                    <li><i class="fa fa-envelope"></i> (381) +123456789</li>
                    <li><i class="fa fa-phone"></i> info@cactus.com </li>
                    <li class="info-icon-roted"><i class="fa fa-map-marker"></i>PO Box 1622 Colins West.</li>
                </ul>
            </div>
            <div class="mobile-social-wrap">
                <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                <a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>
                <a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
                <a class="google" href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
            <a class="cart-close" href="#"><i class="dl-icon-close"></i></a>
            <div class="cart-content emptyquickcart">
                <h3>Shopping Cart</h3>
                <ul class="showcartitems">

                </ul>
                <div class="cart-total">
                    <h4>Subtotal: <span class="totalprice">$150.00</span></h4>
                </div>
                <div class="cart-checkout-btn">
                    <a class="btn-hover cart-btn-style" href="/cart">view cart</a>
                    <a class="no-mrg btn-hover cart-btn-style" href="/checkout">checkout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="quickinfo-wrapper-active">
        <a class="quickinfo-close"><i class="dl-icon-close"></i></a>
        <div class="quickinfo-wrap">
            <div class="quickinfo-logo">
                <a href="/"><img src="{{asset("assets/images/logo/logo.png")}}" alt="logo" style="width: 100%;"></a>
            </div>
            <p>The smartest solution to any challenge is often a simple one. So use your common sense. Trust your colleagues’ good judgment. Don’t over-analyse, or complicate things with bureaucracy or hierarchy. It will slow down our speed.</p>
            <div class="quickinfo-address">
                <ul>
                    <li><a href="#">(381) +123456789</a> </li>
                    <li><a href="#">info@cactus.com </a></li>
                    <li>PO Box 1622 Colins Street West.</li>
                </ul>
            </div>

            <div class="quickinfo-social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- search start -->
    <div class="search-content-wrap main-search-active">
        <a class="search-close"><i class="dl-icon-close"></i></a>
        <div class="search-content">
            <p>Start typing and press Enter to search</p>
            <form class="search-form" action="/search" method="post">
                @csrf
                <input type="text" placeholder="Search entire store…" name="searchproduct">
                <button class="button-search"><i class="dl-icon-search10"></i></button>
            </form>
        </div>
    </div>
