@extends("cactustmp")

@section("mainContent")

    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>Cart</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> Cart</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- cart start -->
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="row emptyRow">
                            <div class="col-lg-8 emptyCol">
                                <div class="table-content table-responsive cart-table-content">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Product</th>
                                            <th> Price</th>
                                            <th>Quantity</th>
                                            <th>total</th>
                                        </tr>
                                        </thead>
                                        <tbody id="addCartMain">


                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-clear">
                                        <a href="#" id="removecart">Clear Cart</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="grand-total-wrap emptyCartMain">
                                    <h4>Cart totals</h4>
                                    <div class="grand-total-content">
                                        <div class="single-grand-total">
                                            <div class="single-grand-total-left">
                                                <span>Subtotal</span>
                                            </div>
                                            <div class="single-grand-total-right">
                                                <span class="totalCost">$47.98</span>
                                            </div>
                                        </div>
                                        <div class="single-grand-total">
                                            <div class="single-grand-total-left">
                                                <span>Free shiping</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="cart-total-wrap">
                                        <div class="single-cart-total-left">
                                            <span>Subtotal</span>
                                        </div>
                                        <div class="single-cart-total-right">
                                            <span class="totalCost">$47.98</span>
                                        </div>
                                    </div>
                                    <div class="grand-btn">
                                        <a href="/checkout">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart end -->
@endsection
