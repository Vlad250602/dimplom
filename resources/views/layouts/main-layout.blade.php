<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Online-shop</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,500i,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,600,700" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--== Headroom CSS ==-->
    <link href="{{asset('css/headroom.css')}}" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet" />
    <!--== Ionicons CSS ==-->
    <link href="{{asset('css/ionicons.css')}}" rel="stylesheet" />
    <!--== Material Icon CSS ==-->
    <link href="{{asset('css/material-design-iconic-font.css')}}" rel="stylesheet" />
    <!--== Elegant Icon CSS ==-->
    <link href="{{asset('css/elegant-icons.css')}}" rel="stylesheet" />
    <!--== Font Awesome Icon CSS ==-->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{asset('css/swiper.min.css')}}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{asset('css/fancybox.min.css')}}" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="{{asset('css/slicknav.css')}}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!--wrapper start-->
<div class="wrapper">

    <!--== Start Preloader Content
    <div class="preloader-wrap">
        <div class="preloader">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    == End Preloader Content ==-->

    <!--== Start Header Wrapper ==-->
    <header class="header-area header-default sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="header-logo-area">
                        <a href="/">
                            <img class="logo-main" src="assets/img/logo.png" alt="Logo" />
                            <img class="logo d-none" src="assets/img/logo-light.png" alt="Logo" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-7 d-none d-lg-block">
                    <div class="header-navigation-area">
                        <ul class="main-menu nav position-relative">
                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                            <li class="{{ Request::is('catalog') ? 'active' : '' }}"><a href="/catalog">Catalog</a></li>
                            <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7 col-lg-2 d-none d-sm-block text-end">
                    <div class="header-action-area">
                        <ul class="header-action">
                            <li class="mini-cart">
                                <a class="action-item" href="#/">
                                    <i class="zmdi zmdi-account icon"></i>
                                </a>
                                <div class="mini-cart-dropdown">
                                    <div class="cart-item">
                                        <div class="thumb">
                                            <img class="w-100" src="assets/img/shop/cart/1.jpg" alt="Image-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#/">Literature Classical - s</a></h5>
                                            <span class="product-quantity">1 ×</span>
                                            <span class="product-price">$79.00</span>
                                            <a class="cart-trash" href="javascript:void(0);"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart-item">
                                        <div class="thumb">
                                            <img class="w-100" src="assets/img/shop/cart/2.jpg" alt="Image-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#/">Fit Wool Suit - m / gold</a></h5>
                                            <span class="product-quantity">1 ×</span>
                                            <span class="product-price">$80.00</span>
                                            <a class="cart-trash" href="javascript:void(0);"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart-total-money">
                                        <h5>Total: <span class="money">$159.00</span></h5>
                                    </div>
                                    <div class="cart-btn">
                                        <a href="/cart">View Cart</a>
                                        <a href="/checkout">Checkout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-sm-1 d-block d-lg-none text-end">
                    <button class="btn-menu" type="button"><i class="zmdi zmdi-menu"></i></button>
                </div>
            </div>
        </div>
    </header>
    <!--== End Header Wrapper ==-->

    <main class="main-content">
    @yield('content')
    </main>

    <!--== Start Footer Area Wrapper ==-->
    <footer class="footer-area">
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item">
                            <div class="about-widget">
                                <div class="footer-logo-area">
                                    <a href="index.html">
                                        <img class="logo-main" src="assets/img/logo.png" alt="Logo" />
                                    </a>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectet adipi elit, sed do eius tempor incididun ut labore gthydolore.</p>
                                <ul>
                                    <li><i class="ion-ios7-location-outline"></i> 184 Main Rd E, St Albans VIC 3021,</li>
                                    <li><i class="ion-ios7-email-outline"></i> <a href="mailto://info@example.com">info@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item widget-item-one">
                            <h4 class="widget-title">INFORMATION</h4>
                            <div class="widget-menu-wrap">
                                <ul class="nav-menu">
                                    <li><a href="shop.html">Specials</a></li>
                                    <li><a href="shop.html">New products</a></li>
                                    <li><a href="shop.html">Top sellers</a></li>
                                    <li><a href="shop.html">Our stores</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item widget-item-two">
                            <h4 class="widget-title">QUICK LINKS</h4>
                            <div class="widget-menu-wrap">
                                <ul class="nav-menu">
                                    <li><a href="login.html">New User</a></li>
                                    <li><a href="about-us.html">Help Center</a></li>
                                    <li><a href="about-us.html">Refund Policy</a></li>
                                    <li><a href="about-us.html">Report Spam</a></li>
                                    <li><a href="login.html">Account</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item">
                            <h4 class="widget-title">newsletter</h4>
                            <div class="widget-newsletter">
                                <p>Sign up for our newsletter & promotions</p>
                                <div class="newsletter-form">
                                    <form>
                                        <input type="email" class="form-control" placeholder="email@example.com">
                                        <button class="btn-submit" type="button">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>
                </div>
            </div>

        </div>
        <!--== Start Footer Bottom ==-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="copyright">© 2021, <span>Julie</span>. Made with <i class="fa fa-heart icon-heart"></i> by <a target="_blank" href="https://themeforest.net/user/codecarnival/portfolio"> Codecarnival</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!--== End Footer Bottom ==-->
    </footer>
    <!--== End Footer Area Wrapper ==-->

    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

</div>

<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src="assets/js/modernizr.js"></script>
<!--=== jQuery Min Js ===-->
<script src="assets/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="assets/js/jquery-migrate.js"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="assets/js/popper.min.js"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="assets/js/bootstrap.min.js"></script>
<!--=== jQuery Headroom Min Js ===-->
<script src="assets/js/headroom.min.js"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="assets/js/swiper.min.js"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="assets/js/fancybox.min.js"></script>
<!--=== jQuery Slick Nav Js ===-->
<script src="assets/js/slicknav.js"></script>
<!--=== jQuery Countdown Js ===-->
<script src="assets/js/countdown.js"></script>

<!--=== jQuery Custom Js ===-->
<script src="assets/js/custom.js"></script>

</body>

</html>
