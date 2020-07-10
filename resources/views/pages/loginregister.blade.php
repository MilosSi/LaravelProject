@extends("cactustmp")

@section("mainContent")

    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>About Us</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-register-area section-padding-1 pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="login-register-wrap">
                        <h3>Login</h3>
                        <div class="login-register-form">
                            <form action="/login" method="post">
                                @csrf
                                <div class="sin-login-register">
                                    <label>Email address <span>*</span></label>
                                    <input type="email" name="email">
                                </div>
                                <div class="sin-login-register">
                                    <label>Password <span>*</span></label>
                                    <input type="password" name="password">
                                </div>
                                <div class="login-register-btn-remember">
                                    <div class="login-register-btn">
                                        <button type="submit">Log in</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login-register-wrap register-wrap">
                        <h3>Register</h3>
                        <div class="login-register-form">
                            <form action="/register" method="post">
                                @csrf
                                <div class="sin-login-register">
                                    <label>Username <span>*</span></label>
                                    <input type="text" name="username">
                                </div>
                                <div class="sin-login-register">
                                    <label>Email address <span>*</span></label>
                                    <input type="email" name="email">
                                </div>
                                <div class="sin-login-register">
                                    <label>Password <span>*</span></label>
                                    <input type="password" name="password">
                                </div>

                                <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy.</a></p>
                                <div class="login-register-btn">
                                    <button type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
