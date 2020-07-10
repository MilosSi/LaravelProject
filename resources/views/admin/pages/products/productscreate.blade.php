
@extends("admintmp")

@section("mainContentadmin")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Admin board - Add product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row d-flex">
                <form action="/admin/products" method="post" style="width: 100%;display: flex;flex-wrap: wrap" enctype="multipart/form-data">
                @csrf
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product info</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pro_name">Product name</label>
                                <input type="text" id="pro_name" name="pro_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="pro_desc">Product description</label>
                                <textarea id="pro_desc" name="pro_desc" class="form-control" rows="4" spellcheck="false"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="featured">Featured</label>
                                <select class="form-control custom-select" id="featured" name="featured">
                                    <option value="0">Not featured</option>
                                    <option value="1">Featured</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pro_new">New</label>
                                <select class="form-control custom-select" id="pro_new" name="pro_new">
                                    <option value="0">Not new</option>
                                    <option value="1">New</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sizes">Sizes</label>
                                <select class="form-control custom-select" id="sizes" name="sizes[]" multiple>
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}">{{strtoupper($size->size_name)}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="main_pic">Main picture</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="main_pic" name="main_pic">
                                        <label class="custom-file-label" for="main_pic">Choose a picture</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pic_alt">Picture description / Other will take this desc</label>
                                <input type="text" id="pic_alt" name="pic_alt" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="other_pics">Other pictures</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="other_pics" name="other_pics[]" multiple>
                                        <label class="custom-file-label" for="other_pics">Choose pictures</label>
                                    </div>

                                </div>
                            </div>

                        </div>



                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-7">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Prices</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" id="inputName" class="form-control" name="price">
                            </div>
                            <div class="form-group">
                                <label for="prices_sale">Price on sale</label>
                                <input type="text" id="inputName" class="form-control" name="prices_sale">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Category</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categories">Categories</label>
                                <select class="form-control custom-select" id="categories" name="categories[]" multiple>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->idKategorije}}">{{$cat->cat_name}} : {{$cat->gender_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Tags</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <select class="form-control custom-select" id="tags" name="tags[]" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <input type="submit" id="sub" name="subDodaj" value="Add new product" class="btn btn-success float-right">
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
