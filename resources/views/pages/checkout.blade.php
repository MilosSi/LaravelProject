@extends("cactustmp")

@section("mainContent")

    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>Checkout</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> Checkout</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- checkout start -->
    <div class="checkout-main-area pt-100 pb-100">
        <div class="container">
            @if(!session('user'))
                <div class="customer-zone mb-20">
                <p class="cart-page-title">Please login to proceed. <a class="checkout-click" href="#">Click here to login</a></p>
                <div class="checkout-login-info">
                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
                    <form action="/login" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="sin-checkout-login">
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="sin-checkout-login">
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="button-remember-wrap">
                            <button class="button" type="submit">Login</button>
                        </div>

                    </form>
                </div>
            </div>
            @endif
            <div class="checkout-wrap">
                <div class="row">

                    <div class="col-lg-7">
                        <div class="your-order-area">
                            <h3>Choose address</h3>
                            @if(session('user'))
                                @if(count($address)>0)
                                    <div class="col-lg-12">
                                        <div class="billing-select mb-25">
                                            <input type="hidden" name="idu" id="idu" value="{{session('user')->id}}">
                                            <select class="select-active" name="addresses" id="addresses">
                                                @foreach($address as $a)
                                                    <option value="{{$a->id}}">{{$a->city}} - {{$a->street}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <div class="Place-order mt-30">
                                        <a href="/myaccount">Please add address</a>
                                    </div>
                                @endif

                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4 bigtotal">
                                <div class="your-order-info-wrap products ">
                                    <div class="your-order-info">
                                        <ul>
                                            <li>Product <span>Total</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle chcproducts">


                                    </div>
                                    <div class="checkout-shipping-content">
                                        <div class="shipping-content-left">
                                            <span>Shipping</span>
                                        </div>
                                        <div class="shipping-content-right">
                                            <ul>

                                                <li><input type="radio" name="shipping" value="info2">Free shipping</li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Total <span class="totalchc"> </span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="Direct Bank Transfer" checked="checked" name="payment_method">
                                        <label for="payment_method_1"> Direct Bank Transfer </label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-2" class="input-radio" type="radio" value="Check payments" name="payment_method">
                                        <label for="payment-method-2">Check payments</label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="Cash on delivery" name="payment_method">
                                        <label for="payment-method-3">Cash on delivery </label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="condition-wrap">
                                    <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.</p>
                                    <div class="condition-form mb-25">
                                        <input type="checkbox" name="terms" id="terms">
                                        <span>I have read and agree to the website <a href="#">terms and conditions</a><span class="star">*</span></span>
                                    </div>
                                </div>
                            </div>
                            @if(session('user') && count($address)>0)
                                <div class="Place-order mt-30">
                                    <a href="#" class="placeorder">Place Order</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout end -->
@endsection
