@extends("admintmp")

@section("mainContentadmin")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="home"><a href="/admin/home">Home / </a></li>
                            <li class="breadcrumb-item active"> Admin - Edit Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/admin/categories/{{$catid}}" method="post" style="width: 100%;display: flex;" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Category info</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cat_name">Category name</label>
                                    <input type="text" id="cat_name" name="cat_name" class="form-control" value="{{$category->cat_name}}">
                                </div>
                                <!--            -->
                                <div class="form-group">
                                    <label for="main">Main category</label>
                                    <select class="form-control custom-select" name="main" id="main">

                                        @foreach($maincat as $mc)
                                            <option value="{{$mc->id}}"
                                            @if($category->main_cat_id==$mc->id)
                                                selected
                                            @endif
                                            >{{$mc->cat_name}}</option>
                                        @endforeach
                                        <option value="0"
                                        @if($category->main_cat_id==null)
                                            selected
                                        @endif
                                        >Main</option>
                                    </select>
                                </div>






                            </div>
                            <input type="submit" id="sub" name="subDodaj" value="Update category" class="btn btn-success float-right">
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
