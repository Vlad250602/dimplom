<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Ялинки.ua</title>

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
                            <img class="logo-main" src="{{asset('img/logo.png')}}" alt="Logo" />
                            <img class="logo d-none" src="{{asset('img/logo_light.png')}}" alt="Logo" />
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
                            <li class="currency-menu">
                                <a class="action-item" href="#/"><i class="zmdi zmdi-account icon"></i></a>
                                <ul class="currency-dropdown">
                                    <li class="account">
                                        <a href="#/"><span class="current-account">My account</span></a>
                                        <ul>
                                            @if (Route::has('login'))
                                                @auth
                                                    @if(Auth::user()->admin == 1 )
                                                <li><a href="{{route('home')}}">{{Auth::user()->name}} {{Auth::user()->surname}}</a></li>
                                                    @endif
                                                    <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                                                <li>
                                                    <a style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Sign out
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                                @else
                                                    <li><a href="{{route('login')}}">Login</a></li>
                                                    @if (Route::has('register'))
                                                        <li><a href="{{route('register')}}">Register</a></li>
                                                     @endif
                                                @endauth
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            @if(Auth::user())
                            <li class="mini-cart">
                                <a class="action-item" href="#/">
                                    <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    <span class="cart-quantity">{{$total->count()}}</span>
                                </a>
                                <div class="mini-cart-dropdown">
                                    @foreach($products as $product)
                                    <div class="cart-item">
                                        <div class="thumb">
                                            <img class="w-100"  style="width: 94.75px; height: 94.75px" src="{{($product->image)? Storage::url('image/products/' . $product->image) : asset('img/shop/cart/2.jpg')}}" alt="Image-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#/">{{$product->product_name}}</a></h5>
                                            <span class="product-quantity">{{$product->count}} ×</span>
                                            <span class="product-price">{{$product->price}}₴</span>
                                            <form action="{{route('cart-remove', $product->id)}}" method="post">
                                                @csrf
                                                <button style="border: 0; background: 0" class="cart-trash"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="cart-total-money">
                                        <h5>Total: <span class="money">{{$total->sum('price')}}₴</span></h5>
                                    </div>
                                        @if ($total->count() !== 0)
                                    <div class="cart-btn">
                                        <a href="{{route('cart')}}">View Cart</a>
                                        <a href="{{route('checkout')}}">Checkout</a>
                                    </div>
                                        @else
                                            <div style="text-align: center; margin-top: 10px">Your cart is empty</div>
                                        @endif
                                </div>
                            </li>
                            @endif
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
                                    <a href="{{route('main')}}">
                                        <img class="logo-main" src="{{asset('img/logo.png')}}" alt="Logo"></a>
                                    </a>
                                </div>
                                <ul>
                                    <li><i class="ion-ios7-location-outline"></i> 95 Shevchenka St. VIC 14030,</li>
                                    <li><i class="ion-ios7-email-outline"></i> <a>info@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <!--== Start widget Item ==-->
                        <div class="widget-item widget-item-one">
                            <h4 class="widget-title">ACCOUNT</h4>
                            <div class="widget-menu-wrap">
                                <ul class="nav-menu">
                                    <li><a href="{{route('login')}}">Log in</a></li>
                                    <li><a href="{{route('register')}}">Register</a></li>
                                    <li><a href="{{route('wishlist')}}">Wishlist</a></li>
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
                                    <li><a href="{{route('catalog')}}">Catalog</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    <li><a href="{{route('cart')}}">Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--== End widget Item ==-->
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!--== End Footer Area Wrapper ==-->

    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

</div>

<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src="{{asset('js/modernizr.js')}}"></script>
<!--=== jQuery Min Js ===-->
<script src="{{asset('js/jquery-main.js')}}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{asset('js/jquery-migrate.js')}}"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="{{asset('js/popper.min.js')}}"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!--=== jQuery Headroom Min Js ===-->
<script src="{{asset('js/headroom.min.js')}}"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="{{asset('js/swiper.min.js')}}"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="{{asset('js/fancybox.min.js')}}"></script>
<!--=== jQuery Slick Nav Js ===-->
<script src="{{asset('js/slicknav.js')}}"></script>
<!--=== jQuery Countdown Js ===-->
<script src="{{asset('js/countdown.js')}}"></script>

<!--=== jQuery Custom Js ===-->
<script src="{{asset('js/custom.js')}}"></script>

@yield('custom_js')
</body>

</html>
