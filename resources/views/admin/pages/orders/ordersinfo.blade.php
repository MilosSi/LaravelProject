@extends("admintmp")

@section("mainContentadmin")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order info</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Admin board - Order info</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Customer info</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Username</label>
                                <input type="text" id="inputName" class="form-control" value="{{$order->username}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">City</label>
                                <input type="text" id="inputName" class="form-control" value="{{$order->city}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Street</label>
                                <input type="text" id="inputName" class="form-control" value="{{$order->street}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Zip Code</label>
                                <input type="text" id="inputName" class="form-control" value="{{$order->post_code}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Telephone</label>
                                <input type="text" id="inputName" class="form-control" value="{{$order->telephone}}">
                            </div>

                            <!--            <div class="form-group">-->
                            <!--              <label for="inputDescription">Project Description</label>-->
                            <!--              <textarea id="inputDescription" class="form-control" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>-->
                            <!--            </div>-->

                        </div>



                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-7">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Order info</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" value="{{$order->id_order}}" id="idnar">
                            <div class="form-group">
                                <label for="inputName">Total price</label>
                                <input type="text" id="inputName" class="form-control" value="${{$order->total_price}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Payment type</label>
                                <input type="text" id="inputName" class="form-control" value="{{$order->payment_type}}">
                            </div>
                            <div class="form-group">
                                <label for="statuspro">Status</label>
                                <select class="form-control custom-select" id="statuspro">
                                    <option selected disabled>Choose</option>
                                    <option value="0"
                                    @if($order->processed==0)
                                    selected
                                    @endif
                                    >Pending</option>
                                    <option value="1"
                                    @if($order->processed==1)
                                        selected
                                    @endif
                                    >Completed</option>

                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product name</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Price/1</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id_product}}</td>
                                        <td>{{$product->pro_name}}</td>
                                        <td>{{$product->size}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>
                                            @if($product->prices_sale!=null)
                                                ${{$product->prices_sale}}
                                            @else
                                                ${{$product->price}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
