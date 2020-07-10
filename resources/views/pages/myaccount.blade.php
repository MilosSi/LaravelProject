@extends("cactustmp")

@section("mainContent")
    <div class="popup-wrapper-area editadress">
        <div class="popup-wrapper">
            <span class="popup-off"><i class="dl-icon-close"></i></span>
            <div class="popup-wrapper-all">
                <div class="popup-image">
                    <img src="assets/images/banner/about-us.jpeg" alt="logo">
                </div>
                <div class="popup-subscribe-area">
                    <h2>Edit Address</h2>
                    <div class="subscribe-bottom">
                            <div class="mc-form">
                                <form action="/editaddress" method="post">
                                    @csrf
                                    <input type="hidden" value="" id="id" name="idAddress">
                                    <div class="single-input-item">
                                        <label for="first-name" class="required">City</label>
                                        <input type="text" id="city" name="city" />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="last-name" class="required">Street and number</label>
                                        <input type="text" id="san" name="san" />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="display-name" class="required">Zip Code</label>
                                        <input type="text" id="zipcode" name="zipcode" />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="email" class="required">Telephone</label>
                                        <input type="text" id="telephone" name="telephone" />
                                    </div>
                                    <div class="clear-2"><input type="submit" value="Update" name="subscribe" class="button"></div>
                                </form>




                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>My Account</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> My account</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- my account wrapper start -->
    <div class="my-account-wrapper pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-toggle="tab">Dashboard</a>
                                    <a href="#orders" data-toggle="tab"> Orders</a>

                                    <a href="#address-edit" data-toggle="tab"> address</a>
                                    <a href="#account-info" data-toggle="tab"> Account Details</a>
                                    <a href="/logout">Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hello, <strong>{{session('user')->username}}</strong> (If Not <strong>{{session('user')->username}} !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                            </div>

                                            <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Address</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$order->id_order}}</td>
                                                            <td>{{date("d-m-Y", strtotime($order->order_created))}}</td>
                                                            @if($order->processed==0)
                                                                <td>Pending</td>
                                                            @else
                                                                    <td>Approved</td>
                                                            @endif
                                                            <td>{{$order->city}} - {{$order->street}}</td>
                                                            <td>${{$order->total_price}}</td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            @if(count($address)>0)
                                            <h3>Billing Address</h3>
                                                <p><strong>{{session('user')->username}}</strong></p>
                                                <div class="row">
                                                @foreach($address as $a)
                                                    <div class="col-md-3">
                                                        <address>

                                                            <p>{{$a->street}} {{$a->post_code}}<br>
                                                                {{$a->city}}</p>
                                                            <p>Mobile: {{$a->telephone}}</p>
                                                        </address>
                                                        <a href="#" class="check-btn sqr-btn editadd" data-id="{{$a->id}}"><i class="fa fa-edit"></i> Edit Address</a>
                                                    </div>

                                                @endforeach
                                                </div>
                                            @else
                                                <h3>Add first billing address</h3>
                                            @endif
                                                <div class="account-details-form">
                                                    <form action="/addaddress" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="first-name" class="required">City</label>
                                                                    <input type="text" id="first-name" name="city" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="last-name" class="required">Street and number</label>
                                                                    <input type="text" id="last-name" name="san" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="display-name" class="required">Zip Code</label>
                                                            <input type="text" id="display-name" name="zipcode" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Telephone</label>
                                                            <input type="text" id="email" name="telephone" />
                                                        </div>

                                                        <div class="single-input-item">
                                                            <button class="check-btn sqr-btn ">Add Address</button>
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Account Details</h3>
                                            <div class="account-details-form">
                                                <form action="/editmyaccount" method="post">
                                                    @csrf

                                                    <div class="single-input-item">
                                                        <label for="display-name" class="required">Username</label>
                                                        <input type="text" id="username" name="username" value="{{session('user')->username}}"/>
                                                    </div>
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="single-input-item">
                                                            <label for="current-pwd" class="required">Current Password</label>
                                                            <input type="password" id="current-pwd" name="password"/>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="newpswd" class="required">New Password</label>
                                                            <input type="password" id="newpswd-pwd" name="newpassword"/>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn" type="submit">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
@endsection
