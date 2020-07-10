@extends("cactustmp")

@section("mainContent")
    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>Collections</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> collections</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-area pt-100 pb-100">
        <div class="custom-container">

            <div class="shop-wrapper">
                <div class="row">
                    @if(count($products)==0)
                        <h3 class="text-center" style="width: 100%;"> Sorry, this collection is currently empty! </h3>
                        <a href="/" class="text-center" style="margin-top: 15px; padding: 20px;background-color: #a38b5e;display: flex;margin-left: auto;margin-right: auto;width: 30%;color: #fff;justify-content: center; border-radius: 5px;">Home</a>
                    @else
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product-wrap mb-50">
                                    <div class="product-img mb-25">
                                        <a href="/product/{{$product->id_product}}">
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
                                        <h3><a href="/product/{{$product->id_product}}">{{$product->pro_name}}</a></h3>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
