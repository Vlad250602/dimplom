@extends('layouts.main-layout')

@section('content')
    <section class="home-slider-area">
        <div class="swiper-container swiper-slide-gap home-slider-container default-slider-container">
            <div class="swiper-wrapper home-slider-wrapper slider-default">
                @foreach($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="slider-content-area" data-bg-img="{{($slider->slider_image)? Storage::url('image/sliders/' . $slider->slider_image) :asset('/img/slider/slider-02.jpg')}}">
                            <div class="slider-content">
                                <h5 class="sub-title">BEST PRICE : {{$slider->discount_price}}₴</h5>
                                <h2 class="title">{{$slider->product_name}}</h2>
                                <h4>{{intval(100 - $slider->discount_price / $slider->price * 100)}}% OFF</h4>
                                <p>{{$slider->slider_desc}}</p>
                                <a class="btn-slider" href="{{route('product-details', $slider->id)}}">Shop Now</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <!--== Add Swiper Arrows ==-->
            <div class="swiper-button-next"><i class="ion-ios7-arrow-right"></i></div>
            <div class="swiper-button-prev"><i class="ion-ios7-arrow-left"></i></div>
        </div>
    </section>

    <section class="feature-area">
        <div class="container pb-1">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <!--== Start Feature Item ==-->
                    <div class="feature-icon-box">
                        <div class="inner-content">
                            <div class="icon-box">
                                <i class="icon ei ei-icon_pin_alt"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Free shipping worldwide</h5>
                                <p>Freeship over oder $100</p>
                            </div>
                        </div>
                    </div>
                    <!--== End Feature Item ==-->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!--== Start Feature Item ==-->
                    <div class="feature-icon-box">
                        <div class="inner-content">
                            <div class="icon-box">
                                <i class="icon ei ei-icon_headphones"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Support 24/7</h5>
                                <p>Contact us 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <!--== End Feature Item ==-->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!--== Start Feature Item ==-->
                    <div class="feature-icon-box">
                        <div class="inner-content mb-0">
                            <div class="icon-box">
                                <i class="icon ei ei-icon_creditcard"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">100% secure payment</h5>
                                <p>Your payment are safe with us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                <!--== End Feature Item ==-->

                <section class="product-area">
                    <div class="container product-pb" data-padding-bottom="25">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-category-tab-wrap">
                                    <ul class="nav nav-tabs product-category-nav justify-content-center" id="myTab"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="best-seller-tab" data-bs-toggle="tab"
                                                    data-bs-target="#bestSeller" type="button" role="tab"
                                                    aria-controls="bestSeller" aria-selected="true">Best Seller
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="new-arrivals-tab" data-bs-toggle="tab"
                                                    data-bs-target="#newArrivals" type="button" role="tab"
                                                    aria-controls="newArrivals" aria-selected="false">New Arrivals
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content product-category-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="bestSeller" role="tabpanel"
                                             aria-labelledby="best-seller-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div
                                                        class="swiper-container swiper-slide-gap product-slider-container">
                                                        <div class="swiper-wrapper">
                                                            @for($i = 0; $i < count($best_sellers)-1; $i += 2)
                                                                <div class="swiper-slide">
                                                                    <!--== Start Shop Item ==-->
                                                                    <div class="product-item">
                                                                        <div class="inner-content">
                                                                            <div class="product-thumb">
                                                                                <a href="{{route('product-details', $best_sellers[$i]->id)}}">
                                                                                    <img class="w-100"
                                                                                         style="@if ($best_sellers[$i]->count <= 0) opacity:50%; @endif"
                                                                                         src="{{($best_sellers[$i]->image)? Storage::url('image/products/' . $best_sellers[$i]->image) : asset('img/shop/1.jpg')}}"
                                                                                         alt="Image-HasTech">
                                                                                </a>
                                                                                @if ($best_sellers[$i]->count <= 0)
                                                                                    <span
                                                                                        class="sale-title bg-theme-color sticker">Soldout</span>
                                                                                @elseif($best_sellers[$i]->discount_price > 0)
                                                                                    <span class="sale-title sticker">Sale</span>
                                                                                    <span class="percent-count sticker">{{intval(100 - $best_sellers[$i]->discount_price / $best_sellers[$i]->price * 100)}}%</span>
                                                                                @endif
                                                                                <div class="product-action">
                                                                                    <div class="addto-wrap"
                                                                                         style="margin-right: -10px">
                                                                                        @if ($best_sellers[$i]->count > 1)
                                                                                            <form
                                                                                                action="{{route('cart-add', $best_sellers[$i]->id)}}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                <button type="submit"
                                                                                                        style="visibility: hidden">
                                                                                                    <a class="add-cart">
                                                                                                        <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                                                    </a>
                                                                                                </button>
                                                                                            </form>
                                                                                        @endif
                                                                                        <form
                                                                                            action="{{route('wishlist-add',$best_sellers[$i]->id)}}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            <button type="submit"
                                                                                                    style="visibility: hidden">
                                                                                                <a class="add-wishlist">
                                                                                                    <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                                                </a>
                                                                                            </button>
                                                                                        </form>
                                                                                        <form>
                                                                                            @csrf
                                                                                            <a style="margin-left: 7px; margin-top: 3px"
                                                                                               class="add-quick-view"
                                                                                               href="{{route('product-details', $best_sellers[$i]->id)}}">
                                                                                                <i class="zmdi zmdi-search icon"></i>
                                                                                            </a>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-desc">
                                                                                <div class="product-info">
                                                                                    <h4 class="title"><a
                                                                                            href="{{route('product-details', $best_sellers[$i]->id)}}">{{$best_sellers[$i]->product_name}} {{$best_sellers[$i]->size}}m</a>
                                                                                    </h4>
                                                                                    <div class="prices">
                                                                                        @if($best_sellers[$i]->discount_price > 0)
                                                                                            <span class="price">{{$best_sellers[$i]->discount_price}}₴</span>
                                                                                            <span
                                                                                                class="price-old">{{$best_sellers[$i]->price}}</span>
                                                                                        @else
                                                                                            <span class="price">{{$best_sellers[$i]->price}}₴</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--== End Shop Item ==-->

                                                                    <!--== Start Shop Item ==-->
                                                                    <div class="product-item">
                                                                        <div class="inner-content">
                                                                            <div class="product-thumb">
                                                                                <a href="{{route('product-details', $best_sellers[$i+1]->id)}}">
                                                                                    <img class="w-100"
                                                                                         style="@if ($best_sellers[$i+1]->count <= 0) opacity:50%; @endif"
                                                                                         src="{{($best_sellers[$i+1]->image)? Storage::url('image/products/' . $best_sellers[$i+1]->image) : asset('img/shop/1.jpg')}}"
                                                                                         alt="Image-HasTech">
                                                                                </a>
                                                                                @if ($best_sellers[$i+1]->count <= 0)
                                                                                    <span
                                                                                        class="sale-title bg-theme-color sticker">Soldout</span>
                                                                                @elseif($best_sellers[$i+1]->discount_price > 0)
                                                                                    <span class="sale-title sticker">Sale</span>
                                                                                    <span class="percent-count sticker">{{intval(100 - $best_sellers[$i+1]->discount_price / $best_sellers[$i+1]->price * 100)}}%</span>
                                                                                @endif
                                                                                <div class="product-action">
                                                                                    <div class="addto-wrap"
                                                                                         style="margin-right: -10px">
                                                                                        @if ($best_sellers[$i+1]->count > 1)
                                                                                            <form
                                                                                                action="{{route('cart-add', $best_sellers[$i+1]->id)}}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                <button type="submit"
                                                                                                        style="visibility: hidden">
                                                                                                    <a class="add-cart">
                                                                                                        <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                                                    </a>
                                                                                                </button>
                                                                                            </form>
                                                                                        @endif
                                                                                        <form
                                                                                            action="{{route('wishlist-add',$best_sellers[$i+1]->id)}}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            <button type="submit"
                                                                                                    style="visibility: hidden">
                                                                                                <a class="add-wishlist">
                                                                                                    <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                                                </a>
                                                                                            </button>
                                                                                        </form>
                                                                                        <form>
                                                                                            @csrf
                                                                                            <a style="margin-left: 7px; margin-top: 3px"
                                                                                               class="add-quick-view"
                                                                                               href="{{route('product-details', $best_sellers[$i+1]->id)}}">
                                                                                                <i class="zmdi zmdi-search icon"></i>
                                                                                            </a>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-desc">
                                                                                <div class="product-info">
                                                                                    <h4 class="title"><a
                                                                                            href="{{route('product-details', $best_sellers[$i+1]->id)}}">{{$best_sellers[$i+1]->product_name}} {{$best_sellers[$i+1]->size}}m</a>
                                                                                    </h4>
                                                                                    <div class="prices">
                                                                                        @if($best_sellers[$i+1]->discount_price > 0)
                                                                                            <span class="price">{{$best_sellers[$i+1]->discount_price}}₴</span>
                                                                                            <span
                                                                                                class="price-old">{{$best_sellers[$i+1]->price}}</span>
                                                                                        @else
                                                                                            <span class="price">{{$best_sellers[$i+1]->price}}₴</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--== End Shop Item ==-->
                                                                </div>
                                                            @endfor
                                                        </div>
                                                        <!--== Add Swiper navigation Buttons ==-->
                                                        <div class="swiper-button-prev"><i
                                                                class="ei ei-icon_arrow_carrot-left"></i></div>
                                                        <div class="swiper-button-next"><i
                                                                class="ei ei-icon_arrow_carrot-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="newArrivals" role="tabpanel"
                                             aria-labelledby="new-arrivals-tab">
                                            <div class="row">
                                                @for($i = 0; $i < count($new_arrivals)-1; $i += 2)
                                                    <div class="col-sm-6 col-lg-4 col-xl-3">
                                                        <!--== Start Shop Item ==-->
                                                        <div class="product-item">
                                                            <div class="inner-content">
                                                                <div class="product-thumb">
                                                                    <a href="{{route('product-details', $new_arrivals[$i]->id)}}">
                                                                        <img class="w-100"
                                                                             style="@if ($new_arrivals[$i]->count <= 0) opacity:50%; @endif"
                                                                             src="{{($new_arrivals[$i]->image)? Storage::url('image/products/' . $new_arrivals[$i]->image) : asset('img/shop/1.jpg')}}"
                                                                             alt="Image-HasTech">
                                                                    </a>
                                                                    @if ($new_arrivals[$i]->count <= 0)
                                                                        <span class="sale-title bg-theme-color sticker">Soldout</span>
                                                                    @elseif($new_arrivals[$i]->discount_price > 0)
                                                                        <span class="sale-title sticker">Sale</span>
                                                                        <span class="percent-count sticker">{{intval(100 - $new_arrivals[$i]->discount_price / $new_arrivals[$i]->price * 100)}}%</span>
                                                                    @endif
                                                                    <div class="product-action">
                                                                        <div class="addto-wrap"
                                                                             style="margin-right: -10px">
                                                                            @if ($new_arrivals[$i]->count > 1)
                                                                                <form
                                                                                    action="{{route('cart-add', $new_arrivals[$i]->id)}}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                            style="visibility: hidden">
                                                                                        <a class="add-cart">
                                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                                        </a>
                                                                                    </button>
                                                                                </form>
                                                                            @endif
                                                                            <form
                                                                                action="{{route('wishlist-add',$new_arrivals[$i]->id)}}"
                                                                                method="post">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                        style="visibility: hidden">
                                                                                    <a class="add-wishlist">
                                                                                        <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                                    </a>
                                                                                </button>
                                                                            </form>
                                                                            <form>
                                                                                @csrf
                                                                                <a style="margin-left: 7px; margin-top: 3px"
                                                                                   class="add-quick-view"
                                                                                   href="{{route('product-details', $new_arrivals[$i]->id)}}">
                                                                                    <i class="zmdi zmdi-search icon"></i>
                                                                                </a>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-desc">
                                                                    <div class="product-info">
                                                                        <h4 class="title"><a
                                                                                href="{{route('product-details', $new_arrivals[$i]->id)}}">{{$new_arrivals[$i]->product_name}} {{$new_arrivals[$i]->size}}m</a>
                                                                        </h4>
                                                                        <div class="prices">
                                                                            @if($new_arrivals[$i]->discount_price > 0)
                                                                                <span class="price">{{$new_arrivals[$i]->discount_price}}₴</span>
                                                                                <span
                                                                                    class="price-old">{{$new_arrivals[$i]->price}}</span>
                                                                            @else
                                                                                <span class="price">{{$new_arrivals[$i]->price}}₴</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--== End Shop Item ==-->

                                                        <!--== Start Shop Item ==-->
                                                        <div class="product-item">
                                                            <div class="inner-content">
                                                                <div class="product-thumb">
                                                                    <a href="{{route('product-details', $new_arrivals[$i+1]->id)}}">
                                                                        <img class="w-100"
                                                                             style="@if ($new_arrivals[$i+1]->count <= 0) opacity:50%; @endif"
                                                                             src="{{($new_arrivals[$i+1]->image)? Storage::url('image/products/' . $new_arrivals[$i+1]->image) : asset('img/shop/1.jpg')}}"
                                                                             alt="Image-HasTech">
                                                                    </a>
                                                                    @if ($new_arrivals[$i+1]->count <= 0)
                                                                        <span class="sale-title bg-theme-color sticker">Soldout</span>
                                                                    @elseif($new_arrivals[$i+1]->discount_price > 0)
                                                                        <span class="sale-title sticker">Sale</span>
                                                                        <span class="percent-count sticker">{{intval(100 - $new_arrivals[$i+1]->discount_price / $new_arrivals[$i+1]->price * 100)}}%</span>
                                                                    @endif
                                                                    <div class="product-action">
                                                                        <div class="addto-wrap"
                                                                             style="margin-right: -10px">
                                                                            @if ($new_arrivals[$i+1]->count > 1)
                                                                                <form
                                                                                    action="{{route('cart-add', $new_arrivals[$i+1]->id)}}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                            style="visibility: hidden">
                                                                                        <a class="add-cart">
                                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                                        </a>
                                                                                    </button>
                                                                                </form>
                                                                            @endif
                                                                            <form
                                                                                action="{{route('wishlist-add',$new_arrivals[$i+1]->id)}}"
                                                                                method="post">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                        style="visibility: hidden">
                                                                                    <a class="add-wishlist">
                                                                                        <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                                    </a>
                                                                                </button>
                                                                            </form>
                                                                            <form>
                                                                                @csrf
                                                                                <a style="margin-left: 7px; margin-top: 3px"
                                                                                   class="add-quick-view"
                                                                                   href="{{route('product-details', $new_arrivals[$i+1]->id)}}">
                                                                                    <i class="zmdi zmdi-search icon"></i>
                                                                                </a>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-desc">
                                                                    <div class="product-info">
                                                                        <h4 class="title"><a
                                                                                href="{{route('product-details', $new_arrivals[$i+1]->id)}}">{{$new_arrivals[$i+1]->product_name}} {{$new_arrivals[$i+1]->size}}m</a>
                                                                        </h4>
                                                                        <div class="prices">
                                                                            @if($new_arrivals[$i+1]->discount_price > 0)
                                                                                <span class="price">{{$new_arrivals[$i+1]->discount_price}}₴</span>
                                                                                <span
                                                                                    class="price-old">{{$new_arrivals[$i+1]->price}}</span>
                                                                            @else
                                                                                <span class="price">{{$new_arrivals[$i+1]->price}}₴</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--== End Shop Item ==-->
                                                    </div>
                                                @endfor
                                            </div>
                                            <!--== Add Swiper navigation Buttons ==-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

@endsection
