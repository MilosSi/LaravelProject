@extends("admintmp")

@section("mainContentadmin")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                        <h5>Disclaimer : If you delete product that it is also special product - special product info will delete also</h5>
                        <a class="btn btn-primary btn-sm" href="products/create" style="margin-top: 25px;">
                            <i class="fas fa-folder">
                            </i>
                            Add product
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Admin board - Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All products</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product name</th>
                                    <th>Featured</th>
                                    <th>New</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->product_id}}</td>
                                        <td>{{$product->pro_name}}
                                        </td>
                                        <td>
                                            @if($product->featured==0)
                                                <span class="badge badge-danger">Not featured</span>
                                            @else
                                                <span class="badge badge-success">Featured</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->pro_new==0)
                                                <span class="badge badge-danger">Not new</span>
                                            @else
                                                <span class="badge badge-success">New</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->prices_sale!=null)
                                                ${{$product->prices_sale}} ON SALE
                                            @else
                                                ${{$product->price}}
                                            @endif
                                        </td>
                                        <td>

                                            <a class="btn btn-info btn-sm" href="/admin/products/{{$product->product_id}}/edit">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form action="/admin/products/{{$product->product_id}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </button>

                                            </form>

                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Product name</th>
                                    <th>Featured</th>
                                    <th>New</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Special products</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/admin/products/special/edit" method="post" style="width: 100%;display: flex;flex-wrap: wrap" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Main special product</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="special">Selected product</label>
                                    <select class="form-control custom-select" id="special" name="special">
                                        @foreach($products as $speprod)
                                            <option value="{{$speprod->product_id}}"
                                            @if($special_main->id_product==$speprod->product_id)
                                                selected
                                            @endif
                                            >
                                                {{$speprod->pro_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="main_pic">Baner image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="main_pic" name="main_pic">
                                            <label class="custom-file-label" for="baner_path">{{$special_main->baner_path}}</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="baner_alt">Picture description / Other will take this desc</label>
                                    <input type="text" id="baner_alt" name="baner_alt" class="form-control" value="{{$special_main->baner_alt}}">
                                </div>

                            </div>



                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-7">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Other special products</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <?php $br=1;?>
                            @foreach($special_second as $ss)

                            <div class="card-body">



                                <div class="form-group">
                                    <label for="other{{$br}}">Selected product</label>
                                    <select class="form-control custom-select" id="other{{$br}}" name="other{{$br}}">
                                        @foreach($products as $speprod)
                                            <option value="{{$speprod->product_id}}"
                                                    @if($ss->id_product==$speprod->product_id)
                                                    selected
                                                @endif
                                            >
                                                {{$speprod->pro_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="other_path{{$br}}">Baner image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="other_path{{$br}}" name="other_path{{$br}}">
                                            <label class="custom-file-label" for="baner_path">{{$ss->baner_path}}</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="baner_alt{{$br}}">Picture description / Other will take this desc</label>
                                    <input type="text" id="baner_alt{{$br}}" name="baner_alt{{$br}}" class="form-control" value="{{$ss->baner_alt}}">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <?php $br++?>
                            @endforeach
                        </div>
                        <!-- /.card -->

                        <input type="submit" id="sub" name="subDodaj" value="Update special products" class="btn btn-success float-right">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
