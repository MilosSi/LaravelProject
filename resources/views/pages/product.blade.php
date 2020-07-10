@extends("cactustmp")

@section("mainContent")
    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>{{$product->gender_name}}`s product</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> {{$product->pro_name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-details-area border-top-2  pt-100 pb-100">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-details-tab">
                        <div class="product-dec-slider-2 product-small-img-style product-dec-left mt-10">
                            @foreach($pictures as $pic)
                            @if($pic->main==1)
                                    <div class="product-dec-small active">
                            @else
                                    <div class="product-dec-small">
                            @endif
                                <img src="{{asset("assets/images/product/$pic->pic_path")}}" alt="{{$pic->pic_alt}}">
                            </div>
                            @endforeach
                        </div>
                        <div class="pro-dec-big-img-slider-2 product-big-img-style product-dec-right">
                            @foreach($pictures as $p)
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset("assets/images/product/$p->pic_path")}}">
                                        <img src="{{asset("assets/images/product/$p->pic_path")}}" alt="{{$p->pic_alt}}">
                                    </a>
                                </div>
                                @if($product->featured)
                                    <span class="badge-pink badge-left ml-3">Feature</span>
                                @endif
                                @if($product->pro_new)
                                    <span class="badge-black badge-right">New</span>
                                @endif
                                @if($product->prices_sale!=null)
                                    <?php
                                    $popust=($product->prices_sale*100)/$product->price;
                                    $popust=round($popust);
                                    $popust=100-$popust;
                                    ?>
                                    <span class="badge-green badge-right">-{{$popust}}%</span>
                                @endif
                                <div class="pro-dec-zoom-img">
                                    <a class="img-popup" href="{{asset("assets/images/product/$p->pic_path")}}"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content product-details-ptb">
                        <div class="breadcrumb-content mb-35">
                            <ul>
                                <li>
                                    <a href="/">Home </a>
                                </li>
                                <li> {{$product->gender_name}}`s product</li>
                                <li> {{$product->pro_name}}</li>
                            </ul>
                        </div>
                        <h2>{{$product->pro_name}}</h2>
                        @if($product->prices_sale!=null)
                            <div class="prices">
                                <h3 class="old-price">${{$product->price}}</h3>
                                <h3 class="new-price">${{$product->prices_sale}}</h3>
                            </div>
                        @else
                            <h3 class="new-price">${{$product->price}}</h3>
                        @endif

                        <div class="product-dec-peragraph">
                            <p>{{substr($product->pro_desc, 0, strpos($product->pro_desc, '.'))}}</p>
                        </div>
                        <div class="product-dec-peragraph mt-3">
                            <div class="form-group">
                                <label for="sizes">Available sizes: </label>
                                <select class="form-control" id="sizes" style="width: 50%;text-align: center">
                                    @foreach($sizes as $size)
                                        <option value="{{$size->size_name}}">{{strtoupper($size->size_name)}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="product-dec-action-wrap pro-dec-action-2">
                            <div class="quality-cart-wrap">
                                <div class="quality-wrap">
                                    <input class="input-text qty" type="text" name="qty" maxlength="12" value="1" title="Qty" id="quantity">
                                </div>
                                <div class="pro-cart-wrap">
                                    <a href="#" class="addtocartproduct" data-id="{{$product->id_product}}">Add to cart</a>
                                </div>
                            </div>
                            <div class="pro-dec-wishlist-compare">
                                <a title="Add to wishlist" href="#" class="wishlistadd" data-id="{{$product->id_product}}"><i class="dl-icon-heart2"></i></a>
                            </div>
                        </div>

                        <div class="description-review-wrapper">
                            <div class="panel-group" id="accordion1">
                                <div class="panel pro-dec-accordion">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#pro-dec-accordion1">
                                                Description
                                            </a>
                                        </h4>
                                    </div>
                                    <div data-parent="#accordion1" id="pro-dec-accordion1" class="product-description-wrapper panel-collapse collapse show">
                                        <div class="panel-body">
                                            <p>{{$product->pro_desc}}</p>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="panel pro-dec-accordion">--}}
{{--                                    <div class="panel-heading">--}}
{{--                                        <h4 class="panel-title">--}}
{{--                                            <a class="collapsed" data-toggle="collapse" href="#pro-dec-accordion2">--}}
{{--                                                Reviews (0)--}}
{{--                                            </a>--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                    <div data-parent="#accordion1" id="pro-dec-accordion2" class="description-review panel-collapse collapse">--}}
{{--                                        <div class="panel-body">--}}
{{--                                            <div class="ratting-form-wrapper">--}}
{{--                                                <h6>Reviews</h6>--}}
{{--                                                <div class="review-comments">--}}
{{--                                                    <p>There are no reviews yet.</p>--}}
{{--                                                    <h6>Be the first to review “Detachable belt dress” </h6>--}}
{{--                                                </div>--}}
{{--                                                <p>Your email address will not be published. Required fields are marked <span>*</span></p>--}}
{{--                                                <div class="star-box-wrap">--}}
{{--                                                    <div class="single-ratting-star">--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="single-ratting-star">--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="single-ratting-star">--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="single-ratting-star">--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="single-ratting-star">--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                        <i class="dl-icon-star"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="ratting-form">--}}
{{--                                                    <form action="#">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-xl-12 col-lg-12 col-md-12">--}}
{{--                                                                <div class="rating-form-style mb-25">--}}
{{--                                                                    <label>Your review <span>*</span></label>--}}
{{--                                                                    <textarea name="Your Review"></textarea>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-xl-4 col-lg-6 col-md-6">--}}
{{--                                                                <div class="rating-form-style mb-30">--}}
{{--                                                                    <label>Name <span>*</span></label>--}}
{{--                                                                    <input type="text">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-xl-4 col-lg-6 col-md-6">--}}
{{--                                                                <div class="rating-form-style mb-30">--}}
{{--                                                                    <label>Email <span>*</span></label>--}}
{{--                                                                    <input type="email">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-xl-12 col-lg-12 col-md-12">--}}
{{--                                                                <div class="form-submit">--}}
{{--                                                                    <input type="submit" value="Submit">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="panel pro-dec-accordion">--}}
{{--                                    <div class="panel-heading">--}}
{{--                                        <h4 class="panel-title">--}}
{{--                                            <a class="collapsed" data-toggle="collapse" href="#pro-dec-accordion3">--}}
{{--                                                Vendor Info--}}
{{--                                            </a>--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                    <div data-parent="#accordion1" id="pro-dec-accordion3" class="pro-additional-info panel-collapse collapse">--}}
{{--                                        <div class="panel-body">--}}
{{--                                            <ul>--}}
{{--                                                <li><span>Store Name:</span> HasTech</li>--}}
{{--                                                <li><span>Vendor:</span> <a href="#">John Smith</a></li>--}}
{{--                                                <li><span>Address:</span>PO Box 16122 Collins Street West <br>Melbourne Victoria 8007</li>--}}
{{--                                                <li><i class="dl-icon-star"></i><i class="dl-icon-star"></i><i class="dl-icon-star"></i><i class="dl-icon-star"></i><i class="dl-icon-star"></i></li>--}}
{{--                                                <li>5.00 rating from 1 review</li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>

                        <div class="product-dec-meta">

                            <span>Categories:<p>{{$product->gender_name}} / {{$mainCat->cat_name}} / {{$subCat->cat_name}}</p></span>
                            <span>Tags: <p>
                                    @foreach($tags as $tag)
                                        #{{$tag->tag_name}}
                                    @endforeach
                                </p></span>
                        </div>
                        <div class="product-social">
                            <span>Share with</span>
                            <ul>
                                <li><a data-toggle="tooltip" title="Share this post on Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a data-toggle="tooltip" title="Share this post on Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a data-toggle="tooltip" title="Share this post on Pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a data-toggle="tooltip" title="Share this post on Google Plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related-product-area pb-45">
        <div class="custom-container">
            <div class="section-title-6 text-center mb-50">
                <h2>Related Products</h2>
            </div>
            <div class="row">
                @foreach($relatedPro as $rp)
                    @if($product->id==$rp->id)
                        @continue
                    @endif
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="product-wrap mb-50">
                        <div class="product-img mb-25">
                            <a href="/product/{{$rp->id}}">
                                <img class="default-img" src="{{asset("assets/images/product/$rp->pic_path")}}" alt="{{$rp->pic_alt}}">

                                @if($rp->featured)
                                    <span class="badge-pink badge-left">Feature</span>
                                @endif


                                @if($rp->prices_sale!=null)
                                    <?php
                                    $popust=($rp->prices_sale*100)/$rp->price;
                                    $popust=round($popust);
                                    $popust=100-$popust;
                                    ?>
                                    <span class="badge-green badge-right">-{{$popust}}%</span>
                                @endif
                            </a>
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{$rp->id_product}}" class="quickadd"><i class="dl-icon-view"></i><span>Quick Shop</span></a>
{{--                                <a data-toggle="tooltip" title="Add to Cart" href="#" class="addtocart" data-id="{{$rp->id_product}}"><i class=" dl-icon-cart29"></i></a>--}}
                                <a data-toggle="tooltip" title="Add to Wishlist" href="#" class="wishlistadd" data-id="{{$product->id_product}}"><i class="dl-icon-heart4"></i></a>

                            </div>
                        </div>
                        <div class="product-content text-center">
                            <h3><a href="/product/{{$rp->id}}">{{$rp->pro_name}}</a></h3>
                            <div class="product-price">
                                @if($rp->prices_sale!=null)
                                    <span class="old-price">${{$rp->price}}</span>
                                    <span class="new-price">${{$rp->prices_sale}}</span>
                                @else
                                    <span>${{$rp->price}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
