@extends("admintmp")

@section("mainContentadmin")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Admin board - Orders</li>
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
                            <h3 class="card-title">Orders info</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example2" class="table  table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Date added</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newsletter as $news)
                                    <tr>
                                        <td>{{$news->id}}</td>
                                        <td>{{$news->email}}</td>
                                        <td> {{date("d-m-Y", strtotime($news->created_at))}}</td>
                                        <td>

                                            <form action="/admin/newsletter/{{$news->id}}" method="post">
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
                                    <th>Email</th>
                                    <th>Date added</th>
                                    <th>Info</th>
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
                        <h1>Send message</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="/admin/newsletter/message" method="post" style="width: 100%;display: flex;flex-wrap: wrap" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Message</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" class="form-control" rows="4" spellcheck="false"></textarea>
                                </div>





                            </div>

                            <input type="submit" id="sub" name="send_message" value="Send message" class="btn btn-success float-right">

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </form>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
