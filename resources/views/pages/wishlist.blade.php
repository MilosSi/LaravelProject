@extends("cactustmp")

@section("mainContent")
    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>Wish list</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> Wish list</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- cart start -->
    <div class="wishlist-main-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-content table-responsive wishlist-table-content emptywhishlist">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Description</th>
                                            <th> Price</th>
                                            <th class="wishlist-cart-none"><span>Add to cart</span></th>
                                        </tr>
                                        </thead>
                                        <tbody class="wishlistitems">

                                        </tbody>
                                    </table>
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
