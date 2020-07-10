
@extends("cactustmp")

@section("mainContent")

    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>All products</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> About Us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="banner-area pt-30">
        <div class="custom-container">
            <div class="row">
                <?php
                    $brp=1;
                ?>
                @foreach($collections as $c)
                    @if($brp==2)
                        @break
                    @endif
                    <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="banner-wrap mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="banner-img banner-hover banner-zoom">
                            <a href="/collections/{{$c->col_id}}" class="colid"><img src="assets/images/collections/{{$c->pic_path}}" alt="{{$c->pic_alt}}" style="width: 100%;height: 100%;"></a>
                        </div>
                        <div class="banner-content">
                            <h3><a href="/collections/{{$c->col_id}}">{{$c->col_name}}</a></h3>
                        </div>

                    </div>

                </div>
                <?php
                    $brp++;
                ?>
                @endforeach
                <div class="col-lg-4 col-md-4 col-xs-12">
                    @foreach($gender as $g)
                        <div class="banner-wrap mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" style="height: 307px;">
                            <div class="banner-img banner-hover banner-zoom">
                                <a href="/shop/{{$g->id}}"><img src="assets/images/gender/{{$g->pic_path}}" alt="{{$g->pic_alt}}"></a>
                            </div>
                            <div class="banner-content">
                                <h3><a href="/shop/{{$g->id}}">{{$g->gender_name}}</a></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                <?php
                    $brd=1;
                ?>
                @foreach($collections as $col)
                    @if($brd!=1)
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="banner-wrap mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                <div class="banner-img banner-hover banner-zoom">
                                    <a href="/collections/{{$c->col_id}}" class="colid"><img src="assets/images/collections/{{$col->pic_path}}" alt="{{$col->pic_alt}}" style="width: 100%;height: 100%;"></a>
                                </div>
                                <div class="banner-content">
                                    <h3><a href="/collections/{{$c->col_id}}">{{$col->col_name}}</a></h3>
                                </div>
                            </div>
                        </div>

                    @endif
                    <?php
                        $brd++;
                    ?>
                @endforeach
            </div>
        </div>
    </div>

    <div class="shop-area pt-95 pb-70">
        <div class="custom-container">
            <div class="collection-content text-center">
                <p>Individually, our values may seem obvious. But put them together and our unique company culture is born. Our values are part of who we are, what we stand for and how we act.</p>
            </div>
            <div class="row">

                @foreach($allcolections as $allcol)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="banner-wrap mb-30">
                        <div class="banner-img banner-hover banner-zoom" style="height: 510px;">
                            <a href="/collections/{{$allcol->col_id}}"><img src="assets/images/collections/{{$allcol->pic_path}}" alt="{{$allcol->pic_alt}}" style="width: 100%;height: 100%;"></a>
                        </div>
                        <div class="banner-content-2">
                            <a href="/collections/{{$allcol->col_id}}">{{$allcol->col_name}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
