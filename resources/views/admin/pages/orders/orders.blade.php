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
                                    <th>Username</th>
                                    <th>Processed</th>
                                    <th>Payment type</th>
                                    <th>Total Price</th>
                                    <th>Info</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id_order}}</td>
                                        <td>{{$order->username}}
                                        </td>
                                        <td>
                                            @if($order->processed==0)
                                                <span class="badge badge-danger">Pending</span>
                                            @else
                                                <span class="badge badge-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>{{$order->payment_type}}</td>
                                        <td>${{$order->total_price}}</td>
                                        <td>

                                            <a class="btn btn-info btn-sm" href="/admin/orders/{{$order->id_order}}/edit">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Info
                                            </a>

                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Processed</th>
                                    <th>Payment type</th>
                                    <th>Total Price</th>
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
    </div>
    <!-- /.content-wrapper -->
@endsection
