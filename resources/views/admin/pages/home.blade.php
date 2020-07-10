@extends("admintmp")

@section("mainContentadmin")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Admin</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Admin board - Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">



                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Orders</span>
                                <span class="info-box-number">{{count($allorders)}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Broj korisnika</span>
                                <span class="info-box-number">{{count($allusers)}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->



                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-8">
                        <!-- MAP & BOX PANE -->
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest Orders</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Total price</th>
                                            <th>More information</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td><a href="#">{{$order->id_order}}</a></td>
                                            <td>{{$order->username}}</td>
                                            <td>

                                                @if($order->processed==0)
                                                    <span class="badge badge-danger">Pending</span>
                                                @else
                                                    <span class="badge badge-success">Completed</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">${{$order->total_price}}</div>
                                            </td>
                                            <td>
                                                <a href="orders/{{$order->id_order}}/edit" class="btn btn-block btn-primary">Info</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="/admin/orders" class="btn btn-sm btn-info float-left">Look all orders</a>

                            </div>
                            <!-- /.card-footer -->
                        </div>

                        <!-- /.card -->

                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest collections</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Collection name</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>More information</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($collections as $col)
                                            <tr>
                                                <td><a href="#">{{$col->col_id}}</a></td>
                                                <td>{{$col->col_name}}</td>
                                                <td>

                                                    @if($col->active==0)
                                                        <span class="badge badge-danger">Not active</span>
                                                    @else
                                                        <span class="badge badge-success">Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{date("d-m-Y", strtotime($col->col_create))}}</div>
                                                </td>
                                                <td>
                                                    <a href="collections/{{$col->col_id}}/edit" class="btn btn-block btn-primary">Info</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="/admin/collections" class="btn btn-sm btn-info float-left">Look all collections</a>

                            </div>
                            <!-- /.card-footer -->
                        </div>

                        <!-- /.card -->


                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <!-- Info Boxes Style 2 -->

                        <!-- PRODUCT LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">New Products</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    @foreach($products as $product)
                                        <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset("assets/images/product/$product->pic_path")}}" alt="{{$product->pic_alt}}" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">{{$product->pro_name}}
                                                @if($product->prices_sale!=null)
                                                    <span class="badge badge-warning float-right">${{$product->prices_sale}}</span></a>
                                                @else
                                                    <span class="badge badge-warning float-right">${{$product->price}}</span></a>
                                                @endif

                                            <span class="product-description">
                                                {{substr($product->pro_desc,0,50)}}...
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                <!-- /.item -->
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="/admin/products" class="uppercase">Look all products</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                        <!-- PRODUCT LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Newsletter mail</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    @foreach($newslettermail as $news)
                                        <li class="item">
                                            <div class="product-info">
                                                <a href="javascript:void(0)" class="product-title">{{$news->email}}
                                                <span class="product-description">
                                                   Added: {{date("d-m-Y", strtotime($news->created_at))}}
                                                </span>
                                            </div>
                                        </li>
                                @endforeach
                                <!-- /.item -->
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="index.php?adminpage=proizvodi" class="uppercase">Look all newsletter</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->

{{--            <!-- Default box -->--}}
{{--            <div class="card card-solid">--}}
{{--                <div class="card-body pb-0">--}}
{{--                    <div class="row d-flex align-items-stretch">--}}
{{--                        <?php--}}
{{--                        foreach ($noviKomentari as $komentari):--}}
{{--                        $datum=date("d-m-Y", strtotime($komentari->datum_komentara ));--}}
{{--                        ?>--}}
{{--                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">--}}
{{--                            <div class="card bg-light">--}}
{{--                                <div class="card-header text-muted border-bottom-0">--}}

{{--                                </div>--}}
{{--                                <div class="card-body pt-0">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <h2 class="lead"><b><?= $komentari->ime ?> <?= $komentari->prezime ?></b></h2>--}}
{{--                                            <p class="text-muted text-sm"><b>Datum postavke: </b> <?= $datum?> </p>--}}
{{--                                            <p class="text-muted text-sm"><b>Komentar ostavljen na proizvodu: </b> <?= $komentari->naziv?> </p>--}}
{{--                                            <p class="text-muted text-sm"><b>Naslov komentara: </b> <?= $komentari->naslov?> </p>--}}
{{--                                            <hr>--}}
{{--                                            <p class="text-muted text-sm"><b>Tekst komentara: </b> <?= $komentari->komentar?> </p>--}}

{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer">--}}
{{--                                    <div class="text-right">--}}
{{--                                        <?php if($komentari->aktivan==0):?>--}}
{{--                                        <a href="#" class="btn btn-sm btn-secondary"> Komentar nije odobren </a>--}}
{{--                                        <?php else: ?>--}}
{{--                                        <a href="#" class="btn btn-sm bg-teal"> Komentar je odobren </a>--}}
{{--                                        <?php endif;?>--}}



{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <?php endforeach;?>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--                <div class="card-footer">--}}
{{--                    <nav aria-label="Contacts Page Navigation">--}}
{{--                        <a href="index.php?adminpage=komentari" class="btn btn-sm btn-primary">Pogledaj sve komentare</a>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <!-- /.card-footer -->--}}
{{--            </div>--}}
{{--            <!-- /.card -->--}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
