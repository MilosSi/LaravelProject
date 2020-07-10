<div class="subscribe-area pb-95 pt-40">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-8 col-md-10">
                <div class="subscribe-wrap text-center">
                    <h3 class=" wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">Sign up for our newsletter and get 10% off</h3>
                    <div id="mc_embed_signup" class="subscribe-form  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate=""  name="mc-embedded-subscribe-form" method="post" action="/newsletter">
                            @csrf
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input class="email" type="email" required="" placeholder="Enter your email address.." name="email" value="">
                                <div class="clear">
                                    <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer-area bg-black">
    <div class="footer-top footer-mrg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer-widget footer-about">
                        <ul>
                            <li><a href="tel:+38113456789">(381) +123456789</a></li>
                            <li><a href="mailto:info@cactus.com">info@cactus.com</a></li>
                            <li>PO Box 1622 Colins Street West</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer-widget footer-logo text-center">
                        <a href="index.html"><img src="{{asset("assets/images/logo/logo.png")}}" alt="logo" style="width: 50%;height: 50%"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer-widget footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom border-top-1 pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7 col-12">
                    <div class="footer-widget footer-menu">
                        <nav>
                            <ul>
                                <li><a href="/aboutus">About us</a></li>
                                <li><a href="/ourteam">Our team</a></li>
                                <li><a href="/contactus">Contact us</a></li>
                                <li><a href="/author">Author</a></li>
                                <li><a href="/LaravelDokumentacija.pdf">Documentation</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5 col-12">
                    <div class="footer-widget copyright">
                        <p> © 2020 Cactus All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="dl-icon-close"></span></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters quickviewmodaladd">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
</div>

<!-- All JS is here
============================================ -->

<!-- Modernizer JS -->
<script src="{{asset("assets/js/vendor/modernizr-3.6.0.min.js")}}"></script>
<!-- jquery -->
<script src="{{asset("assets/js/vendor/jquery-3.3.1.min.js")}}"></script>
<!-- Popper JS -->
<script src="{{asset("assets/js/vendor/popper.js")}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset("assets/js/vendor/bootstrap.min.js")}}"></script>
<!-- headroom JS -->
<script src="{{asset("assets/js/plugins/headroom.min.js")}}"></script>
<!-- headroom JS -->
<script src="{{asset("assets/js/plugins/jquery.headroom.js")}}"></script>
<script src="{{asset("assets/js/plugins/owl-carousel.js")}}"></script>
<script src="{{asset("assets/js/plugins/instafeed.js")}}"></script>
<script src="{{asset("assets/js/plugins/magnific-popup.js")}}"></script>
<script src="{{asset("assets/js/plugins/images-loaded.js")}}"></script>
<script src="{{asset("assets/js/plugins/isotope.js")}}"></script>
<script src="{{asset("assets/js/plugins/jarallax.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/slick.js")}}"></script>
<script src="{{asset("assets/js/plugins/easyzoom.js")}}"></script>
<script src="{{asset("assets/js/plugins/resizesensor.js")}}"></script>
<script src="{{asset("assets/js/plugins/sticky-sidebar.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery-ui.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery-ui-touch-punch.js")}}"></script>
<script src="{{asset("assets/js/plugins/wow.js")}}"></script>
<script src="{{asset("assets/js/plugins/tilt.js")}}"></script>
<script src="{{asset("assets/js/plugins/select2.min.js")}}"></script>
<script src="{{asset("assets/js/plugins/countdown.js")}}"></script>
<script src="{{asset("assets/js/plugins/waypoints.js")}}"></script>
<script src="{{asset("assets/js/plugins/counterup.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery.appear.js")}}"></script>
<script src="{{asset("assets/js/plugins/jquery.knob.js")}}"></script>
<script src="{{asset("assets/js/plugins/scrollup.js")}}"></script>
<script src="{{asset("assets/js/plugins/ajax-mail.js")}}"></script>

<!-- Main JS -->
<script src="{{asset("assets/js/main.js")}}"></script>
<script src="{{asset("assets/js/wishlist.js")}}"></script>
<script src="{{asset("assets/js/shop.js")}}"></script>
<script src="{{asset("assets/js/product.js")}}"></script>
<script src="{{asset("assets/js/cart.js")}}"></script>
<script src="{{asset("assets/js/myaccount.js")}}"></script>
<script src="{{asset("assets/js/checkout.js")}}"></script>

</body>

</html>
