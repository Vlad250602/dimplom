@extends('layouts.main-layout')

@section('content')
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb">
                                <li><a href="{{route('main')}}">Home</a></li>
                                <li class="breadcrumb-sep">/</li>
                                <li>Product Details</li>
                            </ul>
                        </nav>
                        <h4 class="title">Product Details</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Single Area Wrapper ==-->
    <section class="product-area product-single-area">
        <div class="container pt-60 pb-0">
            <div class="row">
                <div class="col-12">
                    <div class="product-single-item" data-margin-bottom="63">
                        <div class="row">
                            <div class="col-lg-6">
                                <!--== Start Product Thumbnail Area ==-->
                                <div class="product-thumb">
                                    <div class="swiper-container single-product-thumb-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="zoom zoom-hover">
                                                    <a class="lightbox-image" data-fancybox="gallery" href="{{($product->image)? Storage::url('image/products/' . $product->image) : asset('img/shop/product-single/1.jpg')}}">
                                                        <img src="{{($product->image)? Storage::url('image/products/' . $product->image) : asset('img/shop/product-single/1.jpg')}}" alt="Image-HasTech">
                                                    </a>
                                                    @if ($product->count <= 0)
                                                        <span class="sale-title bg-theme-color sticker">Soldout</span>
                                                    @elseif ($product->discount_price > 0)
                                                    <span class="sale-title sticker">Sale</span>
                                                    <span class="percent-count sticker">{{intval(100 - $product->discount_price / $product->price * 100)}}%</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Product Thumbnail Area ==-->
                            </div>
                            <div class="col-lg-6">
                                <!--== Start Product Info Area ==-->
                                <div class="product-single-info">
                                    <h4 class="title">{{$product->product_name}}</h4>
                                    @if ($product->discount_price > 0)
                                    <div class="prices">
                                        <span class="price">{{$product->discount_price}}₴</span>
                                        <span class="price-old">{{$product->price}}</span>
                                    </div>
                                    @else
                                        <div class="prices">
                                            <span class="price">{{$product->price}}₴</span>
                                        </div>
                                    @endif

                                    <div class="product-select-action">
                                        <div class="select-item">
                                            <label >Height</label>
                                            <label style="color: black">{{$product->size}}M</label>
                                        <br>
                                            <label style="margin-top: 10px">Category</label>
                                            <a style="color: black">{{$category->category_name}}</a>
                                        </div>
                                    </div>

                                    <p style="margin-top: -20px">{{$product->description}}</p>

                                    <div class="product-action-simple">
                                        <form action="{{route('cart-add', $product->id)}}" method="post">
                                            @csrf
                                            <div class="payment-button">
                                                @if ($product->count <= 0)
                                                    <a style="opacity: 50%; cursor: default" class="btn-payment">Buy it now</a>
                                                @else
                                                <button type="submit" style="border: 0; background: 0">
                                                    <a class="btn-payment">Buy it now</a>
                                                </button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--== End Product Info Area ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
