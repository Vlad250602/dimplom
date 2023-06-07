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
                                <li>Products</li>
                            </ul>
                        </nav>
                        <h4 class="title">Products</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-inner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @if (Session::get('error') !== null)
                    <div class="error-div">
                        <i class="zmdi zmdi-alert-circle"></i> {{Session::get('error')}}
                    </div>
                    @endif
                    <div class="product-header-wrap d-md-flex justify-content-md-between align-items-center">
                        <div class="grid-list-option">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid"
                                            aria-selected="true"><i class="fa fa-th"></i></button>
                                    <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list"
                                            aria-selected="false"><i class="fa fa-th-list"></i></button>
                                </div>
                            </nav>
                        </div>
                        <div class="nav-short-area d-md-flex align-items-center">
                            <p class="show-product"></p>
                            <form method="get" action="{{route('catalog')}}">
                            <div class="toolbar-shorter">
                                <label for="SortBy">Sort by</label>
                                <select name="filter" class="form-select" aria-label="Sort by" style="float:left">
                                    <option value="sales">Best Selling</option>
                                    <option value="title_a_z" selected>Alphabetically, A-Z</option>
                                    <option value="title_z_a">Alphabetically, Z-A</option>
                                    <option value="low_to_high">Price, low to high</option>
                                    <option value="high_to_low">Price, high to low</option>
                                    <option value="date_new_old">Date, new to old</option>
                                    <option value="date_old_new">Date, old to new</option>
                                </select>
                                <button style="float: left; border: 0; margin-left: 3px; width: 40px; height: 40px">
                                    <i class="zmdi zmdi-search icon"></i>
                                </button>
                            </div>

                            </form>
                        </div>
                    </div>
                    <div class="product-body-wrap">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                 aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach($data as $product)
                                        <div class="col-sm-6 col-xl-4">
                                            <!--== Start Shop Item ==-->
                                            <div class="product-item">
                                                <div class="inner-content">
                                                    <div class="product-thumb">
                                                        <a href="{{route('product-details', $product->id)}}">
                                                            <img class="w-100" style="width: 270px; height: 270px; @if ($product->count <= 0) opacity:50%; @endif" src="{{($product->image)? Storage::url('image/products/' . $product->image) : asset('img/shop/2.jpg')}}"
                                                                 alt="Image-HasTech">
                                                        </a>
                                                        @if ($product->count <= 0)
                                                            <span class="sale-title bg-theme-color sticker">Soldout</span>
                                                        @elseif($product->discount_price > 0)
                                                            <span class="sale-title sticker">Sale</span>
                                                            <span class="percent-count sticker">{{intval(100 - $product->discount_price / $product->price * 100)}}%</span>
                                                        @endif
                                                        <div class="product-action">
                                                            <div class="addto-wrap" style="margin-right: -10px">
                                                                @if ($product->count > 1 )
                                                                <form action="{{route('cart-add', $product->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    <button type="submit" style="visibility: hidden">
                                                                        <a class="add-cart">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                    </button>
                                                                </form>
                                                                @endif
                                                                <form action="{{route('wishlist-add', $product->id)}}" method="post">
                                                                    @csrf
                                                                    <button type="submit" style="visibility: hidden">
                                                                    <a class="add-wishlist">
                                                                        <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                    </a>
                                                                    </button>
                                                                </form>
                                                                <form>
                                                                    @csrf
                                                                    <a style="margin-left: 7px; margin-top: 3px" class="add-quick-view"
                                                                       href="{{route('product-details', $product->id)}}">
                                                                        <i class="zmdi zmdi-search icon"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-desc">
                                                        <div class="product-info">
                                                            <h4 class="title"><a
                                                                    href="{{route('product-details', $product->id)}}">{{$product->product_name . ' ' . $product->size . 'm'}}</a>
                                                            </h4>
                                                            <div class="prices">
                                                                @if($product->discount_price > 0)
                                                                    <span
                                                                        class="price">{{$product->discount_price}}₴</span>
                                                                    <span class="price-old">{{$product->price}}</span>
                                                                @else
                                                                    <span class="price">{{$product->price}}₴</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--== End Shop Item ==-->
                                        </div>
                                    @endforeach
                                </div>
                                <!--== Start Pagination Wrap ==-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination-content-wrap border-top">
                                            <nav class="pagination-nav">
                                                <div class="pagination justify-content-center">
                                                    {{$data->withQueryString()->links('')}}
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Pagination Wrap ==-->
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @foreach($data as $product)
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="{{route('product-details', $product->id)}}">
                                                                <img class="w-100" src="{{($product->image)? Storage::url('image/products/' . $product->image) : asset('img/shop/2.jpg')}}"
                                                                     alt="Image-HasTech">
                                                            </a>
                                                            @if ($product->count <= 0)
                                                                <span class="sale-title bg-theme-color sticker">Soldout</span>
                                                            @elseif($product->discount_price > 0)
                                                                <span class="sale-title sticker">Sale</span>
                                                                <span class="percent-count sticker">{{intval(100 - $product->discount_price / $product->price * 100)}}%</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="{{route('product-details', $product->id)}}">
                                                                    {{($product->product_name) . ' ' . $product->size . 'm'}}</a></h4>
                                                                <div class="prices">
                                                                    @if($product->discount_price > 0)
                                                                        <span
                                                                            class="price">{{$product->discount_price}}₴</span>
                                                                        <span class="price-old">{{$product->price}}</span>
                                                                    @else
                                                                        <span class="price">{{$product->price}}₴</span>
                                                                    @endif
                                                                </div>
                                                                <p>{{$product->description}}</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        @if ($product->count > 1)
                                                                            <form action="{{route('cart-add', $product->id)}}"
                                                                                  method="post">
                                                                                @csrf
                                                                                <button type="submit" class="add-cart" style="border:0; background: 0; float: left">
                                                                                    <a>
                                                                                        <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                                    </a>
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                        <form action="{{route('wishlist-add', $product->id)}}" method="post">
                                                                            @csrf
                                                                            <button type="submit" class="add-wishlist" style="border:0; background: 0; float: left">
                                                                                <a>
                                                                                    <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                                </a>
                                                                            </button>
                                                                        </form>
                                                                        <form>
                                                                            @csrf
                                                                            <a style="margin-left: 7px; margin-top: 3px; float: left" class="add-quick-view"
                                                                               href="{{route('product-details', $product->id)}}">
                                                                                <i class="zmdi zmdi-search icon"></i>
                                                                            </a>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Shop Item ==-->
                                    </div>
                                    @endforeach
                                </div>
                                <!--== Start Pagination Wrap ==-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination-content-wrap border-top">
                                            <nav class="pagination-nav">
                                                <div class="pagination justify-content-center">
                                                    {{$data->withQueryString()->links('')}}
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Pagination Wrap ==-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!--== Start Product Sidebar Wrapper ==-->
                    <div class="product-sidebar-wrapper">
                        <!--== Start Product Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Search</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-search-form">
                                    <form>
                                        <div class="form-group">
                                            <input class="form-control" type="search" name="search" placeholder="Search our store">
                                            <button type="submit" class="btn-src"><i class="zmdi zmdi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--== End Product Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Custom Menu</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-nav-menu">
                                    <a href="{{route('main')}}">Home</a>
                                    <a class="active" href="{{route('catalog')}}">Catalog</a>
                                    <a href="{{route('home')}}">Contact</a>
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Categories</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-nav-menu">
                                    @foreach($categories as $category)
                                        <form>
                                            <input type="hidden" name="category" value="{{$category->id}}">
                                            <button style="border: 0; background: 0" type="submit"><a>{{$category->category_name}}</a></button>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->
                    </div>
                    <!--== End Product Sidebar Wrapper ==-->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')

@endsection
