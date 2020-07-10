
@extends("admintmp")

@section("mainContentadmin")
    <input type="hidden" id="idp" value="{{$idp}}">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Admin board - Edit product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row d-flex">
                <form action="/admin/products/{{$idp}}" method="post" style="width: 100%;display: flex;flex-wrap: wrap" enctype="multipart/form-data">
                    <input type="hidden" name="main_price_id" value="{{$product->main_price_id}}">
                    @method('patch')
                    @csrf
                    <div class="col-md-6">
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
                                    <input type="text" id="pro_name" name="pro_name" class="form-control"  value="{{$product->pro_name}}">
                                </div>

                                <div class="form-group">
                                    <label for="pro_desc">Product description</label>
                                    <textarea id="pro_desc" name="pro_desc" class="form-control" rows="4" spellcheck="false">{{$product->pro_desc}}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="featured">Featured</label>
                                    <select class="form-control custom-select" id="featured" name="featured">

                                        <option value="0"
                                        @if($product->featured==0)
                                            selected
                                        @endif
                                        >Not featured</option>
                                        <option value="1"
                                        @if($product->featured==1)
                                            selected
                                        @endif
                                        >Featured</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pro_new">New</label>
                                    <select class="form-control custom-select" id="pro_new" name="pro_new">
                                        <option value="0"
                                        @if($product->pro_new==1)
                                        selected
                                        @endif

                                        >Not new</option>
                                        <option value="1"
                                        @if($product->pro_new==1)
                                        selected
                                        @endif
                                        >New</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sizes">Sizes</label>
                                    <select class="form-control custom-select" id="sizes" name="sizes[]" multiple>
                                        @foreach($sizes as $size)
                                            <option value="{{$size->id}}"
                                            @foreach($selectedsizes as $ss)
                                                @if($ss->id_size==$size->id)
                                                    selected
                                                @endif
                                            @endforeach
                                            >{{strtoupper($size->size_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>


{{--                                <div class="form-group">--}}
{{--                                    <label for="main_pic">Main picture</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="custom-file">--}}
{{--                                            <input type="file" class="custom-file-input" id="main_pic" name="main_pic">--}}
{{--                                            <label class="custom-file-label" for="main_pic">Choose a picture</label>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="other_pics">Other pictures</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="custom-file">--}}
{{--                                            <input type="file" class="custom-file-input" id="other_pics" name="other_pics[]" multiple>--}}
{{--                                            <label class="custom-file-label" for="other_pics">Choose pictures</label>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>



                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Main price</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" id="inputName" class="form-control" name="price" value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="prices_sale">Price on sale</label>
                                    <input type="text" id="inputName" class="form-control" name="prices_sale" value="{{$product->prices_sale}}">
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
                                            <option value="{{$cat->idKategorije}}"
                                            @foreach($selectedcat as $scat)
                                                @if($scat->id_category==$cat->idKategorije)
                                                    selected
                                                @endif
                                            @endforeach

                                            >{{$cat->cat_name}} : {{$cat->gender_name}}</option>
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
                                            <option value="{{$tag->id}}"
                                            @foreach($selectedtags as $stags)
                                                @if($stags->id_tags==$tag->id)
                                                    selected
                                                @endif
                                            @endforeach

                                            >{{$tag->tag_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <input type="submit" id="sub" name="subDodaj" value="Update product" class="btn btn-success float-right">

                    </div>


                </form>

                <div class="col-md-6">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Price</th>
                                <th>Price sale</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prices as $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->price}}
                                    <td>{{$p->prices_sale}}
                                    <td>
                                        <input type="radio" name="cbxactiveprice" class="cbxactiveprice" value="{{$p->id}}"
                                        @if($p->active==1)
                                            checked
                                        @endif
                                        > Active
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Price</th>
                                <th>Price sale</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="col-md-6">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Picture</th>
                                <th>Main</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pictures as $pic)
                                <tr>
                                    <td>{{$pic->id}}</td>
                                    <td height="100px"><img src="{{asset("assets/images/product/$pic->pic_path")}}" style="width: 50%;height: 100%;">
                                    <td>
                                        <input type="radio" name="cbxmainpic" class="cbxmainpic" value="{{$pic->id_pictures}}"
                                               @if($pic->main==1)
                                               checked
                                            @endif
                                        > Main
                                    </td>

                                    <td>

                                        <a class="btn btn-danger btn-sm removeimage" href="#" data-id="{{$pic->id_pictures}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Remove image
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Picture</th>
                                <th>Main</th>
                                <th>Remove</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->

                    <form action="/admin/products/addpicture" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="idp" name="idp" value="{{$idp}}">
                        <div class="form-group">
                            <label for="more_pic">Add more pictures</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="more_pic" name="more_pic[]" multiple>
                                    <label class="custom-file-label" for="main_pic">Choose  pictures</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pic_alt_new">Picture description / Other will take this desc</label>
                                <input type="text" id="pic_alt_new" name="pic_alt_new" class="form-control" value="{{$product->pic_alt}}">
                            </div>
                        </div>
                        <input type="submit" id="sub" name="subDodaj" value="Add new pictures" class="btn btn-success float-right">
                    </form>
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
