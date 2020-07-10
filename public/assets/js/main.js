(function ($) {
    "use strict";

    /*--------------------------
        Newsletter Popup
    ---------------------------*/
    setTimeout(function() {
        $('.popup-wrapper-area').css({
            "opacity": "1",
            "visibility": "visible"
        });
        $('.popup-off').on('click', function() {
            $(".popup-wrapper-area").fadeOut(500);
        })
    }, 1000);


    /*====== Currency language active ======*/
    $('.curr-lang-wrap ul li').hover(
        function(){ $(this).addClass('curr-lang-hover') },
        function(){ $(this).removeClass('curr-lang-hover') }
    )

    /*====== SidebarCart ======*/
    function miniCart() {
        var navbarTrigger = $('.cart-active'),
            endTrigger = $('.cart-close'),
            container = $('.sidebar-cart-active'),
            wrapper2 = $('.main-wrapper');

        wrapper2.prepend('<div class="body-overlay"></div>');
        navbarTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('inside');
            wrapper2.addClass('overlay-active');
        });
        endTrigger.on('click', function() {
            container.removeClass('inside');
            wrapper2.removeClass('overlay-active');
        });
        $('.body-overlay').on('click', function() {
            container.removeClass('inside');
            wrapper2.removeClass('overlay-active');
        });
    };
    miniCart();


    /*====== Quickinfo ======*/
    function quickInfo() {
        var navbarTrigger = $('.quick-info-active'),
            endTrigger = $('.quickinfo-close'),
            container = $('.quickinfo-wrapper-active'),
            wrapper2 = $('.main-wrapper-2');

        wrapper2.prepend('<div class="body-overlay-2"></div>');
        navbarTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('quickinfo-visible');
            wrapper2.addClass('overlay-active-2');
        });
        endTrigger.on('click', function() {
            container.removeClass('quickinfo-visible');
            wrapper2.removeClass('overlay-active-2');
        });
        $('.body-overlay-2').on('click', function() {
            container.removeClass('quickinfo-visible');
            wrapper2.removeClass('overlay-active-2');
        });
    };
    quickInfo();

    /*====== Headroom menu sticky ======*/
    $(".intelligent-header").headroom({
        "offset": 175,
    });

    $(".intelligent-header-2").headroom({
        "offset": 0,
    });

    /*----- Slider-active active -----*/
    $('.slider-active-1').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1,
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    })

    /*--
        Slider active 3
    -----------------------------------*/
    $('.slider-active-3').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        fade: false,
        arrows: false,
        responsive: [{
                breakpoint: 767,
                settings: {
                }
            },
            {
                breakpoint: 420,
                settings: {
                    autoplay: true,
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*--
        Slider active 2
    -----------------------------------*/
    $('.slider-active-2').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '350px',
        dots: false,
        fade: false,
        prevArrow: '<span class="slider-icon slider-prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="slider-icon slider-next"><i class="fa fa-angle-right"></i></span>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    centerPadding: '200px',
                }
            },
            {
                breakpoint: 991,
                settings: {
                    centerPadding: '150px',
                }
            },
            {
                breakpoint: 767,
                settings: {
                    centerPadding: '100px',
                }
            },
            {
                breakpoint: 575,
                settings: {
                    autoplay: true,
                    slidesToShow: 1,
                    centerPadding: '30px',
                }
            }
        ]
    });

    /* Product slider active */
    $('.product-slider-active').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        item: 4,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2,
                margin: 30,
            },
            768: {
                items: 2,
                margin: 30,
            },
            992: {
                items: 3,
                margin: 30
            },
            1200: {
                items: 4
            }
        }
    })

    /* Product category slider */
    $('.product-category-slider').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        item: 3,
        margin: 30,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 3
            }
        }
    })

    /* Banner slider active  */
    $('.banner-slider-active').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        item: 3,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1,
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    })

    /* Blog gallery active  */
    $('.blog-gallery-slider').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1,
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    })

    /* Testimonial active  */
    $('.testimonial-active').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        item: 1,
        animateIn: 'zoomIn',
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1,
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    })

    /* Testimonial active 3 */
    $('.testimonial-active-2').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 2,
        margin: 50,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })

    /* Blog related active  */
    $('.blog-related-active').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        item: 1,
        animateIn: 'zoomIn',
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1,
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    })

    /*--
        Instafeed
    -----------------------------------*/
    // User Changeable Access
    var activeId = $("#instafeed"),
          myTemplate = '<div class="instagram-item"><a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a><div class="instagram-hvr-content"><span class="totalcomments"><i class="fa fa-comment"></i>{{comments}}</span><span class="tottallikes"><i class="fa fa-heart"></i>{{likes}}</span></div></div>';
    if (activeId.length) {
        var userID = activeId.attr('data-userid'),
            accessTokenID = activeId.attr('data-accesstoken'),
            userFeed = new Instafeed({
                get: 'user',
                userId: userID,
                accessToken: accessTokenID,
                resolution: 'low_resolution',
                template: myTemplate,
                sortBy: 'least-recent',
                limit: 15,
                links: false
            });
        userFeed.run();
    }

    // Instagram feed carousel active
    $(window).on('load', function() {
        $('.instagram-carousel').owlCarousel({
            loop: true,
            nav: false,
            autoplay: false,
            autoplayTimeout: 5000,
            item: 6,
            margin: 30,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 6
                }
            }
        })
    })

    /* Tooltip active */
    $('[data-toggle="tooltip"]').tooltip()

    /* Quickview slider active */
    $('.quickview-slider-active').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="dl-icon-left"></i>', '<i class="dl-icon-right"></i>'],
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1,
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    })

    /*====== Mobile off canvas active ======*/
    function headermobileAside() {
        var navbarTrigger = $('.mobile-aside-button'),
            endTrigger = $('.mobile-aside-close'),
            container = $('.mobile-off-canvas-active'),
            wrapper = $('.main-wrapper-3');
        wrapper.prepend('<div class="body-overlay-3"></div>');
        navbarTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('inside');
            wrapper.addClass('overlay-active-3');
        });
        endTrigger.on('click', function() {
            container.removeClass('inside');
            wrapper.removeClass('overlay-active-3');
        });
        $('.body-overlay-3').on('click', function() {
            container.removeClass('inside');
            wrapper.removeClass('overlay-active-3');
        });
    };
    headermobileAside();

    /*---------------------
        Mobile-menu
    --------------------- */
    var $offCanvasNav = $('.mobile-menu , .final-clickable-menu'),
        $offCanvasNavSubMenu = $offCanvasNav.find('.dropdown');
    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i></i></span>');
    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();
    /*Category Sub Menu Toggle*/
    $offCanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.parent('li').removeClass('active');
                $this.siblings('ul').slideUp();
            } else {
                $this.parent('li').addClass('active');
                $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                $this.closest('li').siblings('li').find('ul:visible').slideUp();
                $this.siblings('ul').slideDown();
            }
        }
    });

    /*--- Language currency active ----*/
    $('.mobile-language-active').on('click', function(e) {
        e.preventDefault();
        $('.lang-dropdown-active').slideToggle(900);
    });
    $('.mobile-currency-active').on('click', function(e) {
        e.preventDefault();
        $('.curr-dropdown-active').slideToggle(900);
    });
    $('.mobile-account-active').on('click', function(e) {
        e.preventDefault();
        $('.account-dropdown-active').slideToggle(900);
    });

    /*------ Wow Active ----*/
    new WOW().init();

    /*------------
        ScrollUp
    ------------------ */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    /*====== SidebarSearch ======*/
    function sidebarSearch() {
        var searchTrigger = $('.search-active'),
            endTriggersearch = $('.search-close'),
            container = $('.main-search-active');
        searchTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('search-visible');
        });
        endTriggersearch.on('click', function() {
            container.removeClass('search-visible');
        });
    };
    sidebarSearch();

    /*---------------------
        Video popup
    --------------------- */
    $('.video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        zoom: {
            enabled: true,
        }
    });

    /*--------------------------
        Masonry active
    ---------------------------- */
    $('.grid').imagesLoaded(function() {
        // init Isotope
        $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            layoutMode: 'masonry',
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-sizer',
            }
        });
    });

    /*--
        Masonry active 2
    -----------------------------------*/
    $('.grid-2').imagesLoaded(function() {
        // init Isotope
        var $grid = $('.grid-2').isotope({
            itemSelector: '.grid-item-2',
            percentPosition: true,
            layoutMode: 'masonry',
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-item-2',
            }
        });
    });


    /* Jarallax active  */
    $('.jarallax').jarallax({
        speed: 0.7
    });

    /*=========================
		Toggle Ativation
	===========================*/
    function itemToggler() {
        $(".toggle-item-active").slice(0, 9).show();
        $(".item-wrapper").find(".loadMore").on('click', function(e) {
            e.preventDefault();
            $(this).parents(".item-wrapper").find(".toggle-item-active:hidden").slice(0, 1).slideDown();
            if ($(".toggle-item-active:hidden").length == 0) {
                $(this).parent('.toggle-btn').fadeOut('slow');
            }
        });
    }
    itemToggler();

     /*====== Clickable main menu ======*/
    function clickableMenu() {
        var navbarTrigger = $('.clickable-menu-active'),
            endTrigger = $('.clickable-menu-close'),
            container = $('.clickablemenu-wrapper-active'),
            wrapper4 = $('.main-wrapper-4');

        wrapper4.prepend('<div class="body-overlay-4"></div>');
        navbarTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('clickablemenu-visible');
            wrapper4.addClass('overlay-active-4');
        });
        endTrigger.on('click', function() {
            container.removeClass('clickablemenu-visible');
            wrapper4.removeClass('overlay-active-4');
        });
        $('.body-overlay-4').on('click', function() {
            container.removeClass('clickablemenu-visible');
            wrapper4.removeClass('overlay-active-4');
        });
    };
    clickableMenu();

    /*--
        Magnific Popup
    ------------------------*/
    $('.img-popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    /* Tilt active */
    $('.tilt-active').tilt({
        maxTilt: 10,
        perspective: 1000,
        easing: 'cubic-bezier(.03,.98,.52,.99)',
        speed: 1200,
        glare: true,
        maxGlare: 0.4,
        scale: 1
    });

    /*-----------------------
        Shop filter active
    ------------------------- */
    $('.shop-filter-active').on('click', function(e) {
        e.preventDefault();
        $('.product-filter-wrapper').slideToggle();
    })

    /*---------------------
        Price slider
    --------------------- */
    var sliderrange = $('#slider-range');
    var amountprice = $('#amount');
    $(function() {
        sliderrange.slider({
            range: true,
            min: 13,
            max: 100,
            values: [0, 80],
            slide: function(event, ui) {
                amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        amountprice.val("$" + sliderrange.slider("values", 0) +
            " - $" + sliderrange.slider("values", 1));
    });

    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    /*--
        Product details big image slider
    -----------------------------------*/
    $('.pro-dec-big-img-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        draggable: false,
        fade: false,
        asNavFor: '.product-dec-slider',
    });

    /*--
        Product details slider active
    -----------------------------------*/
    $('.product-dec-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        vertical: false,
        asNavFor: '.pro-dec-big-img-slider',
        dots: false,
        focusOnSelect: true,
        fade: false,
        prevArrow: '<span class="pro-dec-icon pro-dec-prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="pro-dec-icon pro-dec-next"><i class="fa fa-angle-right"></i></span>',
        responsive: [{
                breakpoint: 767,
                settings: {
                }
            },
            {
                breakpoint: 420,
                settings: {
                    autoplay: true,
                    slidesToShow: 2,
                }
            }
        ]
    });

    /*--
        Product details slider 2
    -----------------------------------*/
    $('.pro-dec-big-img-slider-2').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        draggable: false,
        fade: false,
        asNavFor: '.product-dec-slider-2',
    });

    /*--
        Product details 2 slick carousel as Nav
    --------------------------------------------*/
    $('.product-dec-slider-2').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        vertical: true,
        asNavFor: '.pro-dec-big-img-slider-2',
        dots: false,
        focusOnSelect:true,
        fade: false,
        prevArrow: '<span class="pro-dec-icon-2 pro-dec-prev-2"><i class="fa fa-angle-up"></i></span>',
        nextArrow: '<span class="pro-dec-icon-2 pro-dec-next-2"><i class="fa fa-angle-down"></i></span>',
        responsive: [
            {
                breakpoint: 767,
                settings: {

                }
            },
            {
                breakpoint: 420,
                settings: {
                    autoplay: true,
                    slidesToShow: 3,
                }
            }
        ]
    });

    /*----------------------------
    	Cart Plus Minus Button
    ------------------------------ */
    var CartPlusMinus = $('.cart-plus-minus');
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    /*-----------------------
        Login register active
    ------------------------- */
    $('.vendor-close').click(function(){
        $('.vendor-customar-active').slideDown('fast');
    });
    $('.vendor-active').click(function(){
        $('.vendor-customar-active').slideUp(400);
    });

    /*--- showlogin toggle function ----*/
    $('.checkout-click').on('click', function(e) {
        e.preventDefault();
        $('.checkout-login-info').slideToggle(1000);
    });
    /*--- showlogin toggle function ----*/
    $('.checkout-click-2').on('click', function(e) {
        e.preventDefault();
        $('.checkout-login-info-2').slideToggle(1000);
    });

    /*-------------------------
        Create an account toggle
    --------------------------*/
    $('.checkout-toggle2').on('click', function() {
        $('.open-toggle2').slideToggle(1000);
    });

    /*-------------------------
    Create an account toggle
    --------------------------*/
    $('.checkout-ship').on('click', function() {
        $('.checkout-ship-open').slideToggle(1000);
    });

    /*-------------------------
        Checkout toggle function
    --------------------------*/
    var checked = $( '.sin-payment input:checked' )
    if(checked){
        $(checked).siblings( '.payment-box' ).slideDown(900);
    };
	 $( '.sin-payment input' ).on('change', function() {
        $( '.payment-box' ).slideUp(900);
        $(this).siblings( '.payment-box' ).slideToggle(900);
    });

    /*---------------------
        Select active
    --------------------- */
    $('.select-active').select2();

    /*---------------------
        Countdown
      --------------------- */
    $('.timer [data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown years"> <span>%-Y </span><p>Years</p></span> <span class="cdown month"> <span>%-M </span><p>Months</p></span> <span class="cdown week"> <span>%-w </span><p>Weeks</p></span> <span class="cdown day"> <span>%-D </span><p>Days</p></span> <span class="cdown hour"> <span> %-H</span> <p>Hrs</p></span> <span class="cdown minutes"><span>%M</span> <p>Mins</p></span class="cdown second"> <span> <span>%S</span> <p>Secs</p></span>'));
        });
    });

    /*---------------------
        Countdown 2
      --------------------- */
    $('.timer-2 [data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown day"> <span>%-D </span><p>Days</p></span> <span class="cdown hour"> <span> %-H</span> <p>Hrs</p></span> <span class="cdown minutes"><span>%M</span> <p>Mins</p></span class="cdown second"> <span> <span>%S</span> <p>Secs</p></span>'));
        });
    });

    /*---------------------
       Circular Bars - Knob
    --------------------- */
    if(typeof($.fn.knob) != 'undefined') {
        $('.knob').each(function () {
            var $this = $(this),
              knobVal = $this.attr('data-rel');
            $this.knob({
                'draw' : function () {
                  $(this.i).val(this.cv + '%')
                }
            });
          $this.appear(function() {
            $({
              value: 0
            }).animate({
              value: knobVal
            }, {
              duration : 2000,
              easing   : 'swing',
              step     : function () {
                $this.val(Math.ceil(this.value)).trigger('change');
              }
            });
          }, {accX: 0, accY: -150});
        });
    }

    /*--------------------------
    counterUp
    ---------------------------- */
    $('.count').counterUp({
        delay: 10,
        time: 5000
    });

    /*---------------------
        Sidebar sticky active
    --------------------- */
    $('.sidebar-sticky').stickySidebar({
        topSpacing: 40,
        bottomSpacing: 30,
        minWidth: 991,
    });

    /*---------------------
        Sidebar active
    --------------------- */
    $('.sidebar-sticky-2').stickySidebar({
        topSpacing: 121,
        bottomSpacing: 50,
        minWidth: 991,
    });



})(jQuery);





$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Whishlist dodavanje

    $(".wishlistadd").click(function (e) {
        e.preventDefault();
        let id=$(this).data('id');
        $.ajax({
            type:"POST",
            url:"/ajaxwishlist",
            data:{
                id
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {
                let price=0;
                if(podaci.prices_sale!=null)
                {
                    price=podaci.prices_sale;
                }
                else
                {
                    price=podaci.price;
                }
                let ok=true;
                let wishlist=ordersIn('wishlist');
                if(wishlist!=null)
                {
                    wishlist.forEach(function (elem) {
                        if(elem.idProizovda==id)
                            ok=false
                    })
                }
                if(ok)
                {
                    addToOrder(podaci.id,podaci.pro_name,podaci.pic_path,podaci.pro_desc,price,1,"wishlist");
                    alert('Product added to wish list')
                }

            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        })
    })

    //Filter kategorija

    $(".filtercategory").click(function (e) {
        e.preventDefault();
        let idCategory=$(this).data('id');
        let idGender=$(this).data('gender');

        $.ajax({
            type:"POST",
            url:"/ajaxcategory",
            data:{
                idCategory
            },
            dataType: "json",
            success:function(podaci,jq,kod)
            {
                // console.log(podaci);
                createCategoryProduct(podaci,idGender);
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        })
    })


    //Prikaz brzog pregleda
    $(".quickadd").click(function (e) {
        e.preventDefault();
        let id=$(this).data('id');

        showQuickViewAjax(id);


    })
})


function createQuickView(elem)
{
    let price=0;
    let ispis=``;
    ispis+=`
       <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <img src="/assets/images/product/${elem.product.pic_path}" alt="${elem.product.pic_alt}" class="img-fluid">
                <!-- Thumbnail Large Image End -->
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="product-details-content">
                    <h2>${elem.product.pro_name}</h2>`;
                    if(elem.product.prices_sale!=null)
                    {
                       price=elem.product.prices_sale;
                    }
                    else
                    {
                        price=elem.product.price;
                    }

                    ispis+=`<h3>$ ${price}</h3>
                    <div class="product-dec-peragraph">
                        <p>${elem.product.pro_desc}</p>
                    </div>
                    <div class="product-dec-action-wrap">
                        <div class="quality-cart-wrap">

                            <div class="pro-cart-wrap">
                                <a href="/product/${elem.product.id}">Order now</a>
                            </div>
                        </div>
                        <div class="pro-dec-wishlist-compare">
                            <a title="Add to wishlist" href="#" class="wishlistadd" data-id="${elem.product.id}"><i class="dl-icon-heart2"></i></a>
                        </div>
                    </div>

                    <div class="product-dec-meta">
                        <span>Categories: <a href="#">${elem.product.gender_name}</a></span>
                        <span>Tags:`;

                        elem.tags.forEach(function (tagsElem) {

                            ispis+=` <a href="#">${tagsElem.tag_name}</a>,`;

                        })
                    ispis = ispis.substring(0, ispis.length - 1);
                    ispis+=`
                    </span>
                    </div>
                    <div class="product-social">
                        <span>Share with</span>
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        `;


    $(".quickviewmodaladd").html(ispis);


}

function  createCategoryProduct(data,idGender) {
    let ispis=``;
    let popust=0;
    data.forEach(function (elem) {
        ispis+=`
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-50">
                                <div class="product-img mb-25">
                                    <a href="/product/${elem.id_product}">
                                        <img class="default-img" src="assets/images/product/${elem.pic_path}" alt="">`;
                                        if(elem.prices_sale!=null)
                                        {
                                            popust=(elem.prices_sale*100)/elem.price;
                                            popust=Math.round(popust);
                                            popust=100-popust;

                                            ispis+=`<span class="badge-green badge-right">${popust} %</span>`;
                                        }

                                        if(elem.featured==1)
                                        {
                                            ispis+=`<span class="badge-pink badge-left">Hot</span>`;
                                        }
                            ispis+=`
                                    </a>
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" href="#" onclick="showQuickViewAjax(${elem.id_product})"><i class="dl-icon-view"></i><span>Quick Shop</span></a>

                                        <a data-toggle="tooltip" title="Add to Wishlist" href="#" class="wishlistadd" data-id="${elem.id_product}"><i class="dl-icon-heart4"></i></a>

                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="${elem.id_product}">${elem.pro_name}</a></h3>
                                    <div class="product-price">`;
                                        if(elem.prices_sale)
                                        {
                                            ispis+=`
                                            <span class="old-price">$${elem.price}</span>
                                            <span class="new-price">$${elem.prices_sale}</span>`;
                                        }
                                        else
                                            ispis+=`<span class="new-price">$${elem.price}</span>`;




                                    ispis+=`
                                    </div>
                                </div>
                            </div>
                        </div>
        `;
    })

    if(idGender==1)
    {
        $(".men").html(ispis);
    }
    else
    {
        $(".women").html(ispis);
    }
}


//F=Local storage Fje
function numberOfOrders(data)
{
    var brKolicina=0;
    brKolicina=data.length;
    return brKolicina;
}
function totalPrice(data) {
    let ukupnaCena=0;
    data.forEach(function (element) {
        ukupnaCena=ukupnaCena+(Number(element.cenaSaPopustom)*element.kolicina);
    })
    return ukupnaCena;
}

function ordersIn(tip)
{
    return JSON.parse(localStorage.getItem(tip));
}

function addToOrder(idProzivoda,nazivP,putanjaSlike,opisProizvoda,cena,kolicina=null,tip)
{
    var idProizovda=idProzivoda;
    var naziv=nazivP;
    var putanja=putanjaSlike;
    var opis=opisProizvoda;
    var cenaP=cena;
    var kolicinaP=kolicina;

    var order=ordersIn(tip);
    if(order)
    {
        addToLocal(idProizovda,naziv,putanja,opis,cenaP,kolicinaP);
    }
    else
    {
        makeFirstOrder(idProizovda,naziv,putanja,opis,cenaP,kolicinaP);
    }

    function addToLocal(idProizovda,naziv,putanja,opis,cenaP,kolicinaP)
    {
        let orders=ordersIn(tip);
        let orderJson=
            {
                "idProizovda":idProizovda,
                "naziv":naziv,
                "putanja":putanja,
                "opis":opis,
                "cenaP":cenaP,
                "kolicinaP":kolicinaP
            }
        orders.push(orderJson);
        localStorage.setItem(tip,JSON.stringify(orders));
    }

    function makeFirstOrder(idProizovda,naziv,putanja,opis,cenaP,kolicinaP)
    {
        let orders=[];
        orders[0]=
            {
                "idProizovda":idProizovda,
                "naziv":naziv,
                "putanja":putanja,
                "opis":opis,
                "cenaP":cenaP,
                "kolicinaP":kolicinaP
            };
        localStorage.setItem(tip,JSON.stringify(orders));
    }
}
function deleteOrder(idProizvoda,tip)
{
    var narudzbe=ordersIn(tip);
    var rezultat=narudzbe.filter(function(elem){
        if(elem.idProizovda!=idProizvoda)
        {
            return elem;
        }
    });

    localStorage.setItem(tip,JSON.stringify(rezultat));

    if(rezultat.length==0)
    {
        location.reload();
        deleteCart(tip);
    }
    return true;
}

function deleteOrderCart(idProizvoda,velicina)
{
    var narudzbe=ordersIn('korpa');
    var rezultat=narudzbe.filter(function(elem){
        if(elem.idProizovda!=idProizvoda || elem.velicina!=velicina)
        {
            return elem;
        }
    });

    localStorage.setItem('korpa',JSON.stringify(rezultat));

    if(rezultat.length==0)
    {
        location.reload();
        deleteCart(tip);
    }
    return true;
}

function updateOrder(data,novaKolicina,idP,velicina)
{
    var rez=data.filter(function(elem){

        if(elem.idProizovda==idP && elem.velicina==velicina)
        {
            elem.kolicina=Number(novaKolicina);
        }
        return elem;
    })

    localStorage.setItem("korpa",JSON.stringify(rez));
}
function deleteCart(tip)
{
    localStorage.removeItem(tip);
}

let wishlist=ordersIn('wishlist');




//Fje za rad sa korpom i povecanjem kolicine


function addToOrderCart(idProizvoda,putanjaSlike,opisProizvoda,nazivP,cenaPopust,kolicina=null,size)
{
    var idProizovda=idProizvoda;
    var putanjaMS=putanjaSlike;
    var nazivProizvoda=nazivP;
    var cenaSaPopustom=cenaPopust;
    var kolicina=kolicina;
    var opis=opisProizvoda;
    var velicina=size;



    var order=ordersIn('korpa');
    if(order)
    {
        addToLocal(idProizovda,putanjaMS,nazivProizvoda,cenaSaPopustom,opis,kolicina,velicina);
    }
    else
    {
        makeFirstOrder(idProizovda,putanjaMS,nazivProizvoda,cenaSaPopustom,opis,kolicina,velicina);
    }




    function addToLocal(idProizovda,putanjaMS,nazivProizvoda,cenaSaPopustom,opis,kolicina,velicina)
    {
        let orders=ordersIn('korpa');
        var duplikat=1;


        orders.forEach(function(elem){
            if(elem.idProizovda==idProizovda && elem.velicina==velicina)
            {
                if(kolicina==null)
                {
                    elem.kolicina=Number(elem.kolicina)+1;
                }
                else
                {
                    elem.kolicina=Number(elem.kolicina)+Number(kolicina);
                }
                duplikat=elem.kolicina;
            }
        })
        if(kolicina!=null && duplikat==1)
        {
            let orderJson=
                {
                    "idProizovda":idProizovda,
                    "putanjaMS":putanjaMS,
                    "opis":opis,
                    "nazivProizvoda":nazivProizvoda,
                    "cenaSaPopustom":cenaSaPopustom,
                    "velicina":velicina,
                    "kolicina":kolicina
                }
            orders.push(orderJson);
            duplikat=kolicina+1;
        }
        localStorage.setItem("korpa",JSON.stringify(orders));

    }

    function makeFirstOrder(idProizovda,putanjaMS,nazivProizvoda,cenaSaPopustom,opis,kolicina,velicina)
    {
        let orders=[];
        if(kolicina==null)
        {
            orders[0]=
                {
                    "idProizovda":idProizovda,
                    "putanjaMS":putanjaMS,
                    "opis":opis,
                    "nazivProizvoda":nazivProizvoda,
                    "cenaSaPopustom":cenaSaPopustom,
                    "velicina":velicina,
                    "kolicina":1
                };
        }
        else
        {
            orders[0]=
                {
                    "idProizovda":idProizovda,
                    "putanjaMS":putanjaMS,
                    "opis":opis,
                    "nazivProizvoda":nazivProizvoda,
                    "cenaSaPopustom":cenaSaPopustom,
                    "velicina":velicina,
                    "kolicina":kolicina
                };
        }
        localStorage.setItem("korpa",JSON.stringify(orders));
    }
}



function createQuickCart(data) {
    let ispis=``;
    data.forEach(function (elem) {
        ispis+=`
         <li class="single-product-cart">
            <div class="cart-img">
                <a href="/product/${elem.idProizovda}"><img src="/assets/images/product/${elem.putanjaMS}" alt=""></a>
            </div>
            <div class="cart-title">
                <h4><a href="/product/${elem.idProizovda}">${elem.nazivProizvoda} x ${elem.velicina.toUpperCase()}</a></h4>
                <span>${elem.kolicina} × $${elem.cenaSaPopustom}</span>
            </div>
            <div class="cart-delete">
                <a href="#" class="removefromcart" data-id="${elem.idProizovda}" data-size="${elem.velicina}">×</a>
            </div>
        </li>

        `;
    })

    $(".showcartitems").html(ispis);
}

function createEmptyQuickCart() {
    let ispis=`
        <h3>Shopping Cart</h3>
        <div class="cart-checkout-btn">
             <a class="btn-hover cart-btn-style" href="/allproducts">Your cart is empty</a>
        </div>

    `;
    $(".emptyquickcart").html(ispis);
}

function showQuickViewAjax(id)
{
    $.ajax({
        type:"POST",
        url:"/ajaxquickview",
        data:{
            id
        },
        dataType: "json",
        success:function(podaci,jq,kod)
        {
            // console.log(podaci);
            createQuickView(podaci);
        },
        error:function(err)
        {
            console.log(`${err.status}`);
        }
    })
}

function addToCartAjax(id,size,kolicina=null)
{
    $.ajax({
        type:"POST",
        url:"/ajaxwishlist",
        data:{
            id
        },
        dataType: "json",
        success:function(podaci,jq,kod)
        {
            let price=0;
            if(podaci.prices_sale!=null)
            {
                price=podaci.prices_sale;
            }
            else
            {
                price=podaci.price;
            }
            addToOrderCart(podaci.id,podaci.pic_path,podaci.pro_desc,podaci.pro_name,price,kolicina,size);
            location.reload();
        },
        error:function(err)
        {
            console.log(`${err.status}`);
        }
    })
}

var cart=ordersIn('korpa');


if(cart!=null)
{
    var totalPrice=totalPrice(cart);
    var totalNumber=numberOfOrders(cart);


    createQuickCart(cart);
    $(".cartnumber").html(totalNumber);
    $(".totalprice").html("$"+totalPrice);

}
else
{
    $(".cartnumber").html(0);
    createEmptyQuickCart()
}


