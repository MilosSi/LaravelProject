@extends("admintmp")

@section("mainContentadmin")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Collections</h1>
                        <a class="btn btn-primary btn-sm" href="collections/create" style="margin-top: 25px;">
                            <i class="fas fa-folder">
                            </i>
                            Add collection
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Admin board - Collections</li>
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
                            <h3 class="card-title">All Collections</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Collection name</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($collections as $col)
                                <tr>
                                    <td>{{$col->col_id}}</td>
                                    <td>{{$col->col_name}}
                                    </td>
                                    <td>
                                        @if($col->col_active==0)
                                            <span class="badge badge-danger">Not active</span>
                                        @else
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td> {{date("d-m-Y", strtotime($col->col_create))}}</td>
                                    <td>

                                        <a class="btn btn-info btn-sm" href="/admin/collections/{{$col->col_id}}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/admin/collections/{{$col->col_id}}" method="post">
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
    </div>
    <!-- /.content-wrapper -->
@endsection
