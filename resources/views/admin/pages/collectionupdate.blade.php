@extends("admintmp")

@section("mainContentadmin")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update collection</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="home"><a href="/admin/home">Home / </a></li>
                            <li class="breadcrumb-item active"> Admin - Update Collection</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/admin/collections/{{$collectionid}}" method="post" style="width: 100%;display: flex;" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Collection info</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="col_name">Collection name</label>
                                    <input type="text" id="col_name" name="col_name" class="form-control" value="{{$collection->col_name}}">
                                </div>
                                <!--            -->
                                <div class="form-group">
                                    <label for="active">Active category</label>
                                    <select class="form-control custom-select" name="active" id="active">
                                        <option value="1"
                                        @if($collection->col_active==1)
                                          selected
                                        @endif>Active</option>
                                        <option value="0"
                                        @if($collection->col_active==0)
                                            selected
                                        @endif
                                        >Not active</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Collection picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="id_col_pic" name="id_col_pic">
                                            <label class="custom-file-label" for="id_col_pic">Current : {{$collection->pic_path}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pic_alt">Picture description</label>
                                    <input type="text" id="pic_alt" name="pic_alt" class="form-control" value="{{$collection->pic_alt}}">
                                </div>





                            </div>
                            <input type="submit" id="sub" name="subDodaj" value="Update Collection" class="btn btn-success float-right">
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </form>
            </div>
        </section>
        <!-- /.content -->


        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Collection products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="home"><a href="/admin/home">Home / </a></li>
                            <li class="breadcrumb-item active"> Admin - Add/Remove products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="row">


                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Products not in collection</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">

                                <!--            -->
                                <div class="form-group">
                                    <label for="addtocolpro">Products</label>
                                    <select class="form-control custom-select" name="addtocolpro" id="addtocolpro">
                                        @foreach($freeproducts as $product)
                                        <option value="{{$product->id}}">{{$product->pro_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="button" name="addtocol" id="addtocol" value="Add product to collection" class="btn btn-success float-right" data-id="{{$collectionid}}">
                                </div>



                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colproducts as $product)
                                    <tr>
                                        <td>{{$product->id_product}}</td>
                                        <td>{{$product->pro_name}}

                                        <td>

                                            <a class="btn btn-danger btn-sm removeproduct" href="#" data-id="{{$product->id_product}}" data-idcol="{{$collectionid}}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Remove from collection
                                            </a></td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Product name</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a href="/admin/home" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection
