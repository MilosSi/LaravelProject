@extends("admintmp")

@section("mainContentadmin")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories (If you delete main category it also deletes it s sub categories)</h1>
                        <a class="btn btn-primary btn-sm" href="categories/create" style="margin-top: 25px;">
                            <i class="fas fa-folder">
                            </i>
                            Add category
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Admin board - Tags</li>
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
                            <h3 class="card-title">All tags</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category name</th>
                                    <th>Main</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $cat)
                                    <tr>
                                        <td>{{$cat->id}}</td>
                                        <td>{{$cat->cat_name}}
                                        </td>
                                        <td>
                                            @if($cat->main_cat_id!=null)
                                                <span class="badge badge-danger">Not main</span>
                                            @else
                                                <span class="badge badge-success">Main</span>
                                            @endif
                                        </td>
                                        <td> {{date("d-m-Y", strtotime($cat->created_at))}}</td>
                                        <td>

                                            <a class="btn btn-info btn-sm" href="/admin/categories/{{$cat->id}}/edit">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form action="/admin/categories/{{$cat->id}}" method="post">
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
                                    <th>Collection name</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>More information</th>
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
                        <h1>Categories / Gender</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="home"><a href="/admin/home">Home / </a></li>
                            <li class="breadcrumb-item active"> Admin - Add/Remove category</li>
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
                            <h3 class="card-title">Gender - Categories</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <!--    Gender        -->
                            <div class="form-group">
                                <label for="genderpick">Choose a gender</label>
                                <select class="form-control custom-select" name="genderpick" id="genderpick">
                                    <option value="0">Pick a gender</option>
                                    @foreach($genders as $gen)
                                        <option value="{{$gen->id}}">{{$gen->gender_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Categories -->
                            <div class="form-group">
                                <label for="categoriesout">Choose a category</label>
                                <select class="form-control custom-select" name="categoriesout" id="categoriesout">
                                    <option disabled value="0">Pick a gender first</option>
                                </select>

                            </div>
                            <input type="button" name="addcattogender" id="addcattogender" value="Add category to gender" class="btn btn-success float-right">



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
                                <th>Category</th>
                                <th>Gender</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="addcatin">

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Gender</th>
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
    </div>
    <!-- /.content-wrapper -->
@endsection

