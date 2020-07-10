@extends("admintmp")

@section("mainContentadmin")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add collection</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="home"><a href="#">Home / </a></li>
                            <li class="breadcrumb-item active"> Admin - Add Collection</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/admin/collections" method="post" style="width: 100%;display: flex;" enctype="multipart/form-data">
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
                                    <input type="text" id="col_name" name="col_name" class="form-control">
                                </div>
                                <!--            -->
                                <div class="form-group">
                                    <label for="active">Active category</label>
                                    <select class="form-control custom-select" name="active" id="active">
                                        <option value="1">Active</option>
                                        <option value="0">Not active</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Collection picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="id_col_pic" name="id_col_pic">
                                            <label class="custom-file-label" for="id_col_pic">Choose a picture</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pic_alt">Picture description</label>
                                    <input type="text" id="pic_alt" name="pic_alt" class="form-control">
                                </div>





                            </div>
                            <input type="submit" id="sub" name="subDodaj" value="Add new collection" class="btn btn-success float-right">
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
    </div>
    <!-- /.content-wrapper -->

@endsection
