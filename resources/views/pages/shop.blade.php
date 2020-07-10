@extends("cactustmp")

@section("mainContent")
    <input type="hidden" id="genderid" value="{{$genderId}}">
    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>{{$gender->gender_name}}`s products</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> {{$gender->gender_name}}`s products</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-70 pb-100">
        <div class="custom-container">
            <div class="row flex-row-reverse">
                <div class="custom-col-width-100" style="width:100%;">
                    <div class="shop-top-bar pb-15">
                        <div class="shop-top-bar-left">
                            <div class="shop-top-show">

                                    <span>Showing {{$pagination->firstItem()}}-{{$pagination->lastItem()}} of {{$pagination->total()}} results</span>


                            </div>
                        </div>
                        <div class="shop-top-bar-right">
                            <div class="shop-filter">
                                <a class="shop-filter-active" href="#">Filters & Sort <i class="fa fa-angle-down angle-down"></i> <i class="fa fa-angle-up angle-up"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-filter-wrapper">
                        <div class="row">
                            <div class="custom-col-width-15 mb-20">
                                <div class="product-filter">
                                    <h5>SORT BY</h5>
                                    <div class="sort-filter">
                                        <ul>
                                            <li class="text-center"><input type="radio" name="sort" value="1" style="height: auto;">By products A-Z</li>
                                            <li class="text-center"><input type="radio" name="sort" value="2" style="height: auto;">By products Z-A</li>
                                            <li class="text-center"><input type="radio" name="sort" value="3" style="height: auto;">By newness</li>
                                            <li class="text-center"><input type="radio" name="sort" value="4" style="height: auto;">By price: low to high</li>
                                            <li class="text-center"><input type="radio" name="sort" value="5" style="height: auto;">By price: high to low</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @foreach($subCategories as $mainCat=>$subCat)
                            <!-- Product Filter -->
                            <div class="custom-col-width-23 mb-20">
                                <div class="product-filter">
                                    <h5>{{$mainCat}}</h5>
                                    <div class="fliter-size">
                                        <ul>
                                            @foreach($subCat as $sc)
                                            <li><input type="checkbox" name="cbxcategory" class="cbxcategory" value="{{$sc->idKategorije}}">&nbsp;&nbsp;{{$sc->cat_name}}    </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Product Filter -->
                            <div class="custom-col-width-23 mb-20">
                                <div class="product-filter sidebar-widget">
                                    <h4 class="pro-sidebar-title">PRICE </h4>
                                    Min : <input type="text" value="0" id="min">
                                    Max : <input type="text" value="500" id="max">
                                </div>
                            </div>
                            <!-- Product Filter -->
                            <div class="custom-col-width-15 mb-20">
                                <div class="product-filter">
                                    <h5>by size</h5>
                                    <div class="fliter-size">
                                        <ul>
                                            @foreach($sizes as $size)

                                                <li><input type="checkbox" name="cbxsizes" class="cbxsizes" value="{{$size->id}}">&nbsp;&nbsp;{{$size->size_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="custom-col-width-15 mb-20">
                                <button type="button" id="filterbutton">Filter</button>

                            </div>
                        </div>
                    </div>
                    <div class="shop-wrapper">
                        <div class="row ajaxfilter">
                            @foreach($pagination as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product-wrap mb-50">
                                    <div class="product-img mb-25">
                                        <a href="/product/{{$product->id}}">
                                            <img class="default-img" src="{{asset("assets/images/product/$product->pic_path")}}" alt="{{$product->pic_alt}}">
                                            @if($product->featured)
                                                <span class="badge-pink badge-left">Feature</span>
                                            @endif

                                            @if($product->prices_sale!=null)
                                                <?php
                                                $popust=($product->prices_sale*100)/$product->price;
                                                $popust=round($popust);
                                                $popust=100-$popust;
                                                ?>
                                                <span class="badge-green badge-right">-{{$popust}}%</span>
                                            @endif
                                        </a>
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{$product->id_product}}" class="quickadd"><i class="dl-icon-view"></i><span>Quick Shop</span></a>
                                            <a data-toggle="tooltip" title="Add to Wishlist" href="#" class="wishlistadd" data-id="{{$product->id_product}}"><i class="dl-icon-heart4"></i></a>

                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="/product/{{$product->id}}">{{$product->pro_name}}</a></h3>
                                        <div class="product-price">
                                            @if($product->prices_sale!=null)
                                                <span class="old-price">${{$product->price}}</span>
                                                <span class="new-price">${{$product->prices_sale}}</span>
                                            @else
                                                <span>${{$product->price}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        </div>
                        <div class="row justify-content-center ajaxlinks">
                            {{$pagination->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
