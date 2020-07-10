@extends("admintmp")

@section("mainContentadmin")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tags</h1>
                        <a class="btn btn-primary btn-sm" href="tags/create" style="margin-top: 25px;">
                            <i class="fas fa-folder">
                            </i>
                            Add tag
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
                                    <th>Tag name</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->tag_name}}
                                        </td>
                                        <td>
                                            @if($tag->active==0)
                                                <span class="badge badge-danger">Not active</span>
                                            @else
                                                <span class="badge badge-success">Active</span>
                                            @endif
                                        </td>
                                        <td> {{date("d-m-Y", strtotime($tag->created_at))}}</td>
                                        <td>

                                            <a class="btn btn-info btn-sm" href="/admin/tags/{{$tag->id}}/edit">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form action="/admin/tags/{{$tag->id}}" method="post">
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
