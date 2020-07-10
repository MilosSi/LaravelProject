@extends("cactustmp")

@section("mainContent")
<div class="slider-area mt-110">
    <div class="slider-active-1 owl-carousel nav-style-2">
        <div class="single-slider bg-img slider-height-2 align-items-center custom-d-flex" style="background-image:url(assets/images/slider/slider-pic-1.jpg);">
            <div class="container">
                <div class="row height-100-percent align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="slider-content-8 slider-animated-1 text-center">
                            <h3 class="animated">DON'T MISS THIS CHANCE </h3>
                            <h1 class="animated">SUMMER SALE</h1>
                            <div class="slider-btn-1">
                                <a class="animated" href="/allproducts">SHOP NOW </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider bg-img slider-height-2 align-items-center custom-d-flex" style="background-image:url(assets/images/slider/slider-pic-2.jpg);">
            <div class="container">
                <div class="row height-100-percent align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="slider-content-9 slider-animated-1">
                            <h1 class="animated slider-red-color"><span>Brand new</span><br> Collections </h1>
                            <div class="slider-btn-1">
                                <a class="animated" href="/allproducts">SHOP NOW </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="service-wrap mb-30 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-icon">
                        <i class="la-icon shopping_box-3d-50"></i>
                    </div>
                    <div class="service-content">
                        <h6>Free Worldwide Shipping</h6>
                        <p>On all orders over $100</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="service-wrap mb-30 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-icon">
                        <i class="la-icon business_money-time"></i>
                    </div>
                    <div class="service-content">
                        <h6>30 Days Money Returns</h6>
                        <p>30 days money back guarantee</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="service-wrap mb-30 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-icon">
                        <i class="la-icon media-2_headphones"></i>
                    </div>
                    <div class="service-content">
                        <h6>Support 24/7</h6>
                        <p>Offered in the country of usage</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="service-wrap mb-30 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-icon">
                        <i class="la-icon tech-2_l-security"></i>
                    </div>
                    <div class="service-content">
                        <h6>100% Secure Checkout</h6>
                        <p>Paypal / Visa / Master Card</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area wow fadeIn" data-wow-delay="0.2s">
    <div class="custom-container">
        <div class="product-tab-list nav pb-55">
            <a class="active" href="#product-1" data-toggle="tab">
                <h3>New Arrival</h3>
            </a>

            <a href="#product-3" data-toggle="tab">
                <h3>Featured.</h3>
            </a>
        </div>
        <div class="tab-content jump padding-20-row-col">
            <div id="product-1" class="tab-pane active">
                <div class="row">
                    @foreach($newProducts as $np)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrap mb-40">
                            <div class="product-img mb-25">
                                <a href="/product/{{$np->id_product}}">
                                    <img class="default-img" src="assets/images/product/{{$np->pic_path}}" alt="{{$np->pic_alt}}">
{{--                                    <img class="hover-img" src="assets/images/product/product-6-2.jpg" alt="">--}}
                                        <span class="badge-black badge-left">New</span>


                                        @if($np->prices_sale!=null)
                                            <?php
                                                $popust=($np->prices_sale*100)/$np->price;
                                                $popust=round($popust);
                                                $popust=100-$popust;
                                            ?>
                                            <span class="badge-green badge-right">-{{$popust}}%</span>
                                        @endif
                                </a>
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{$np->id_product}}" class="quickadd"><i class="dl-icon-view"></i><span>Quick Shop</span></a>
{{--                                    <a data-toggle="tooltip" title="Add to Cart" href="#" class="addtocart" data-id="{{$np->id_product}}"><i class="dl-icon-cart29"></i></a>--}}
                                    <a data-toggle="tooltip" title="Add to Wishlist" href="#" class="wishlistadd" data-id="{{$np->id_product}}"><i class="dl-icon-heart4"></i></a>

                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="/product/{{$np->id_product}}">{{$np->pro_name}}</a></h3>
                                <div class="product-price price-color-2">
                                    @if($np->prices_sale!=null)
                                        <span class="old-price">${{$np->price}}</span>
                                        <span class="new-price">${{$np->prices_sale}}</span>
                                    @else
                                        <span>${{$np->price}}</span>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="all-product-btn mt-10">
                    <a href="/allproducts">View all products</a>
                </div>
            </div>

            <div id="product-3" class="tab-pane">
                <div class="row">
                    @foreach($featuredProducts as $np)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-wrap mb-40">
                                <div class="product-img mb-25">
                                    <a href="/product/{{$np->id_product}}">
                                        <img class="default-img" src="assets/images/product/{{$np->pic_path}}" alt="{{$np->pic_alt}}">
                                        {{--                                    <img class="hover-img" src="assets/images/product/product-6-2.jpg" alt="">--}}
                                        <span class="badge-pink badge-left">Hot</span>


                                        @if($np->prices_sale!=null)
                                            <?php
                                            $popust=($np->prices_sale*100)/$np->price;
                                            $popust=round($popust);
                                            $popust=100-$popust;
                                            ?>
                                            <span class="badge-green badge-right">-{{$popust}}%</span>
                                        @endif
                                    </a>
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{$np->id_product}}" class="quickadd"><i class="dl-icon-view"></i><span>Quick Shop</span></a>
{{--                                        <a data-toggle="tooltip" title="Add to Cart" href="#" class="addtocart" data-id="{{$np->id_product}}"><i class=" dl-icon-cart29"></i></a>--}}
                                        <a data-toggle="tooltip" title="Add to Wishlist" href="#" class="wishlistadd" data-id="{{$np->id_product}}"><i class="dl-icon-heart4"></i></a>


                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="/product/{{$np->id_product}}">{{$np->pro_name}}</a></h3>
                                    <div class="product-price price-color-2">
                                        @if($np->prices_sale!=null)
                                            <span class="old-price">${{$np->price}}</span>
                                            <span class="new-price">${{$np->prices_sale}}</span>
                                        @else
                                            <span>${{$np->price}}</span>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="all-product-btn mt-10">
                    <a href="/allproducts">View all products</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area pt-95 pb-65 wow fadeIn" data-wow-delay="0.2s">
    <div class="custom-container">
        <div class="section-title-3 text-center mb-50">
            <h2>Latest Collections</h2>
        </div>
        <div class="row">
            @foreach($collections as $cl)
            <div class="col-lg-4 col-md-4 col-xs-12" >
                <div class="banner-wrap mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="banner-img banner-hover banner-zoom" style="height: 400px;">
                        <a href="/collections/{{$cl->col_id}}"><img src="assets/images/collections/{{$cl->pic_path}}" alt="{{$cl->pic_alt}}" style="width: 100%;height: 100%;"></a>
                    </div>
                    <div class="banner-content-2">
                        <a href="/collections/{{$cl->col_id}}">{{$cl->col_name}}</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


<div class="banner-area">
    <div class="banner-top">
        <div class="jarallax product-parallax-img" style="background-image: url(assets/images/banner/{{$specialPMain->baner_path}});">
            <div class="row no-gutters">
                <div class="col-lg-5 col-md-6 ml-auto">
                    <div class="banner-content-4 banner-negative-mrg">
                        <h3><a href="/product/{{$specialPMain->id_product}}">{{$specialPMain->pro_name}}</a></h3>
                        <?php
                            if($specialPMain->prices_sale!=null)
                            {
                                $specPrice=$specialPMain->prices_sale;
                            }
                            else
                            {
                                $specPrice=$specialPMain->price;
                            }
                        ?>
                        <span>$ {{$specPrice}}</span>
                        <div class="banner-btn-2">
                            <a href="/product/{{$specialPMain->id_product}}">SHOP <br> NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-bottom padding-20-row-col mt-20">
        <div class="container-fluid">
            <div class="row">
                @foreach($specialPSecond as $sps)
                    <div class="col-lg-6">
                    <div class="banner-wrap mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="banner-img-2">
                            <a href="/product/{{$sps->id_product}}"><img src="assets/images/banner/{{$sps->baner_path}}" alt="{{$sps->baner_alt}}"></a>
                        </div>
                        <div class="banner-content-4 banner-position-1">
                            <h3><a href="/product/{{$sps->id_product}}">{{$sps->pro_name}}</a></h3>
                            <?php
                            if($sps->prices_sale!=null)
                            {
                                $specPrice=$sps->prices_sale;
                            }
                            else
                            {
                                $specPrice=$sps->price;
                            }
                            ?>
                            <span>$ {{$specPrice}}</span>
                            <div class="banner-btn-2">
                                <a href="/product/{{$sps->id_product}}">SHOP <br> NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="product-area pt-100 pb-45">
    <div class="product-all-wrap pb-45">
        <div class="custom-container">
            <div class="row">
                @foreach($gender as $g)
                <div class="col-lg-12 ml-auto">
                    <div class="sec-title-pro-btn-wrap mb-50">
                        <div class="section-title-4">
                            <h2>{{$g->gender_name}}</h2>
                        </div>
                        <div class="all-product-btn text-right">
                            <a href="/allproducts">View all products</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    @foreach($mainCatGen as $mcg)
                        @if($g->id==$mcg->id_gender)
                        <div class="pro-categories-wrap">
                            <div class="pro-categorie-title">
                                <h3>{{$mcg->cat_name}}</h3>
                            </div>
                            <div class="pro-categorie-list">
                                <?php
                                    $subCategories=$categories->getSubCategoryByIdAndGender($mcg->main_cat_id,$g->id);

                                ?>

                                <ul>
                                    @foreach($subCategories as $sc)
                                        <li><a href="shop-fullwide.html" data-id="{{$sc->idKategorije}}" data-gender="{{$g->id}}" class="filtercategory">{{$sc->cat_name}} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

                <div class="col-lg-9 col-md-9">
                    <?php
                        if($g->id==1)
                        {
                            $ajaxclass='men';
                        }
                        else
                        {
                            $ajaxclass='women';
                        }

                    ?>
                    <div class="row {{$ajaxclass}}">
                        <?php
                            $productsByGender=  $products->getAllProductByGender($g->id,6,0);
                        ?>
                        @foreach($productsByGender as $pbg)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-50">
                                <div class="product-img mb-25">
                                    <a href="/product/{{$pbg->id_product}}">
                                        <img class="default-img" src="assets/images/product/{{$pbg->pic_path}}" alt="">
                                        @if($pbg->prices_sale!=null)
                                            <?php
                                            $popust=($pbg->prices_sale*100)/$pbg->price;
                                            $popust=round($popust);
                                            $popust=100-$popust;
                                            ?>
                                            <span class="badge-green badge-right">-{{$popust}}%</span>
                                        @endif

                                        @if($pbg->featured==1)
                                            <span class="badge-pink badge-left">Hot</span>
                                        @endif
                                    </a>
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{$pbg->id_product}}" class="quickadd"><i class="dl-icon-view"></i><span>Quick Shop</span></a>
{{--                                        <a data-toggle="tooltip" title="Add to Cart" href="#" class="addtocart" data-id="{{$pbg->id_product}}"><i class=" dl-icon-cart29"></i></a>--}}
                                        <a data-toggle="tooltip" title="Add to Wishlist" href="#" class="wishlistadd" data-id="{{$pbg->id_product}}"><i class="dl-icon-heart4"></i></a>

                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="/product/{{$pbg->id_product}}">{{$pbg->pro_name}}</a></h3>
                                    <div class="product-price">
                                        @if($pbg->prices_sale)
                                            <span class="old-price">${{$pbg->price}}</span>
                                            <span class="new-price">${{$pbg->prices_sale}}</span>
                                        @else
                                            <span class="new-price">${{$pbg->price}}</span>
                                        @endif




                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
