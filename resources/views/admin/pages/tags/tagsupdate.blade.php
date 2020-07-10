@extends("admintmp")

@section("mainContentadmin")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update tag</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="home"><a href="/admin/home">Home / </a></li>
                            <li class="breadcrumb-item active"> Admin - Update Tag</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/admin/tags/{{$tagid}}" method="post" style="width: 100%;display: flex;" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tag info</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tag_name">Tag name</label>
                                    <input type="text" id="tag_name" name="tag_name" class="form-control" value="{{$tag->tag_name}}">
                                </div>
                                <!--            -->
                                <div class="form-group">
                                    <label for="active">Active category</label>
                                    <select class="form-control custom-select" name="active" id="active">
                                        <option value="1"
                                                @if($tag->active==1)
                                                selected
                                            @endif>Active</option>
                                        <option value="0"
                                                @if($tag->active==0)
                                                selected
                                            @endif
                                        >Not active</option>
                                    </select>
                                </div>






                            </div>
                            <input type="submit" id="sub" name="subDodaj" value="Add new tag" class="btn btn-success float-right">
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </form>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="/admin/home" class="btn btn-secondary">Back</a>

                </div>
            </div>
        </section>
        <!-- /.content -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tag products</h1>
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
                            <h3 class="card-title">Products  tags</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <!--            -->
                            <div class="form-group">
                                <label for="addtotagpro">Products without this tag</label>
                                <select class="form-control custom-select" name="addtotagpro" id="addtotagpro">
                                    @foreach($productsout as $product)
                                        <option value="{{$product->id}}">{{$product->pro_name}}</option>
                                    @endforeach
                                </select>
                                <input type="button" name="addtotag" id="addtotag" value="Add tag to product" class="btn btn-success float-right" data-id="{{$tagid}}">
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
                            @foreach($productsin as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->pro_name}}

                                    <td>

                                        <a class="btn btn-danger btn-sm removeproducttag" href="#" data-id="{{$product->id}}" data-idcol="{{$tagid}}">
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
