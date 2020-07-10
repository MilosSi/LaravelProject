@extends("cactustmp")

@section("mainContent")

    <div class="breadcrumb-area breadcrumb-bg-3 bg-gray mt-150">
        <div class="container-fluid">
            <div class="breadcrumb-content breadcrumb-content-white text-center">
                <div class="breadcrumb-title">
                    <h2>Contact Us</h2>
                </div>
                <ul>
                    <li>
                        <a href="/">Home </a>
                    </li>
                    <li class="active"> Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-us-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="get-in-touch-wrap">
                        <div class="contact-title">
                            <h3>Get in touch</h3>
                        </div>
                        <div class="contact-from">
                            <form id="" action="/contactmessage" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input name="name" type="text" placeholder="Your name*">
                                    </div>
                                    <div class="col-lg-12">
                                        <input name="email" type="email" placeholder="Email address*">
                                    </div>
                                    <div class="col-lg-12">
                                        <input name="phone" type="text" placeholder="Your Phone*">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="submit" type="submit">SEND</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="contact-info-wrap">
                        <div class="contact-title">
                            <h3>Contact info</h3>
                        </div>
                        <div class="contact-info-bottom">
                            <div class="single-contact-info">
                                <h5>Postal Address</h5>
                                <p>PO Box 16122 Collins Street West <br>Victoria 8007 Australia</p>
                            </div>
                            <div class="single-contact-info">
                                <h5>Cactus HQ</h5>
                                <p>PO Box 16122 Collins Street West <br>Victoria 8007 Australia</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-contact-info">
                                        <h5>Business Phone</h5>
                                        <p><a href="tel:+381123456789">(381) +123456789</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-contact-info">
                                        <h5>Say Hello</h5>
                                        <p><a href="#">info@cactus.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
