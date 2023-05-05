@extends('layouts.main-layout')

@section('content')
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
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
                    <div class="product-header-wrap d-md-flex justify-content-md-between align-items-center">
                        <div class="grid-list-option">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                                    <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fa fa-th-list"></i></button>
                                </div>
                            </nav>
                        </div>
                        <div class="nav-short-area d-md-flex align-items-center">
                            <p class="show-product">Showing 1 - 18 of 33 result</p>
                            <div class="toolbar-shorter">
                                <label for="SortBy">Sort by</label>
                                <select id="SortBy" class="form-select" aria-label="Sort by">
                                    <option value="manual">Featured</option>
                                    <option value="best-selling">Best Selling</option>
                                    <option value="title-ascending" selected>Alphabetically, A-Z</option>
                                    <option value="title-descending">Alphabetically, Z-A</option>
                                    <option value="price-ascending">Price, low to high</option>
                                    <option value="price-descending">Price, high to low</option>
                                    <option value="created-descending">Date, new to old</option>
                                    <option value="created-ascending">Date, old to new</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="product-body-wrap">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach($data as $product)
                                    <div class="col-sm-6 col-xl-4">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item">
                                            <div class="inner-content">
                                                <div class="product-thumb">
                                                    <a href="single-product-simple.html">
                                                        <img class="w-100" src="{{asset('img/shop/2.jpg')}}" alt="Image-HasTech">
                                                    </a>
                                                    <span class="sale-title sticker">Sale</span>
                                                    <span class="percent-count sticker">-15%</span>
                                                    <div class="product-action">
                                                        <div class="addto-wrap">
                                                            <a class="add-cart" href="cart.html">
                                                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                            </a>
                                                            <a class="add-wishlist" href="wishlist.html">
                                                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                            </a>
                                                            <a class="add-quick-view" href="javascript:void(0);">
                                                                <i class="zmdi zmdi-search icon"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <div class="product-info">
                                                        <h4 class="title"><a href="single-product-simple.html">{{$product->product_name}}</a></h4>
                                                        <div class="prices">
                                                            <span class="price">{{$product->price}}UAH</span>
                                                            <span class="price-old"></span>
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
                                                <ul class="pagination justify-content-center">
                                                    <li><a class="disabled active prev" href="shop.html">Prev</a></li>
                                                    <li><a class="disabled active" href="shop.html">1</a></li>
                                                    <li><a href="shop.html">2</a></li>
                                                    <li><a class="next" href="shop.html">Next</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Pagination Wrap ==-->
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="single-product-simple.html">
                                                                <img class="w-100" src="assets/img/shop/2.jpg" alt="Image-HasTech">
                                                            </a>
                                                            <span class="sale-title sticker">Sale</span>
                                                            <span class="percent-count sticker">-15%</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="single-product-simple.html"> Ruffled neck blouse</a></h4>
                                                                <div class="prices">
                                                                    <span class="price">$110.00</span>
                                                                    <span class="price-old">$130.00</span>
                                                                </div>
                                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        <a class="add-cart" href="cart.html">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                        <a class="add-wishlist" href="wishlist.html">
                                                                            <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                        </a>
                                                                        <a class="add-quick-view" href="javascript:void(0);">
                                                                            <i class="zmdi zmdi-search icon"></i>
                                                                        </a>
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
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="single-product-simple.html">
                                                                <img class="w-100" src="assets/img/shop/17.jpg" alt="Image-HasTech">
                                                            </a>
                                                            <span class="sale-title sticker">Sale</span>
                                                            <span class="percent-count sticker">-10%</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="single-product-simple.html">This is the large title for testing large title</a></h4>
                                                                <div class="prices">
                                                                    <span class="price">$19.00</span>
                                                                    <span class="price-old">$21.00</span>
                                                                </div>
                                                                <p>A long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal...</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        <a class="add-cart" href="cart.html">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                        <a class="add-wishlist" href="wishlist.html">
                                                                            <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                        </a>
                                                                        <a class="add-quick-view" href="javascript:void(0);">
                                                                            <i class="zmdi zmdi-search icon"></i>
                                                                        </a>
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
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="single-product-simple.html">
                                                                <img class="w-100" src="assets/img/shop/10.jpg" alt="Image-HasTech">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="single-product-simple.html">Primo Court Mid Suede</a></h4>
                                                                <div class="prices">
                                                                    <span class="price">$39.00</span>
                                                                </div>
                                                                <p>As opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for...</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        <a class="add-cart" href="cart.html">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                        <a class="add-wishlist" href="wishlist.html">
                                                                            <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                        </a>
                                                                        <a class="add-quick-view" href="javascript:void(0);">
                                                                            <i class="zmdi zmdi-search icon"></i>
                                                                        </a>
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
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="single-product-simple.html">
                                                                <img class="w-100" src="assets/img/shop/6.jpg" alt="Image-HasTech">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="single-product-simple.html">Fit Wool Suit</a></h4>
                                                                <div class="prices">
                                                                    <span class="price">$80.00</span>
                                                                </div>
                                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        <a class="add-cart" href="cart.html">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                        <a class="add-wishlist" href="wishlist.html">
                                                                            <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                        </a>
                                                                        <a class="add-quick-view" href="javascript:void(0);">
                                                                            <i class="zmdi zmdi-search icon"></i>
                                                                        </a>
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
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="single-product-simple.html">
                                                                <img class="w-100" src="assets/img/shop/1.jpg" alt="Image-HasTech">
                                                            </a>
                                                            <span class="sale-title sticker">Sale</span>
                                                            <span class="percent-count sticker">-18%</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="single-product-simple.html">Meta Slevless Dress</a></h4>
                                                                <div class="prices">
                                                                    <span class="price">$40.00</span>
                                                                    <span class="price-old">$85.00</span>
                                                                </div>
                                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        <a class="add-cart" href="cart.html">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                        <a class="add-wishlist" href="wishlist.html">
                                                                            <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                        </a>
                                                                        <a class="add-quick-view" href="javascript:void(0);">
                                                                            <i class="zmdi zmdi-search icon"></i>
                                                                        </a>
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
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="single-product-simple.html">
                                                                <img class="w-100" src="assets/img/shop/8.jpg" alt="Image-HasTech">
                                                            </a>
                                                            <span class="sale-title bg-theme-color sticker">Soldout</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="single-product-simple.html">Matchbox’ Fit Jeans</a></h4>
                                                                <div class="prices">
                                                                    <span class="price">$19.00</span>
                                                                    <span class="price-old">$29.00</span>
                                                                </div>
                                                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        <a class="add-cart" href="cart.html">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                        <a class="add-wishlist" href="wishlist.html">
                                                                            <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                        </a>
                                                                        <a class="add-quick-view" href="javascript:void(0);">
                                                                            <i class="zmdi zmdi-search icon"></i>
                                                                        </a>
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
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="single-product-simple.html">
                                                                <img class="w-100" src="assets/img/shop/5.jpg" alt="Image-HasTech">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="single-product-simple.html">Flower Print dress</a></h4>
                                                                <div class="prices">
                                                                    <span class="price">$50.00</span>
                                                                </div>
                                                                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        <a class="add-cart" href="cart.html">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                        <a class="add-wishlist" href="wishlist.html">
                                                                            <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                        </a>
                                                                        <a class="add-quick-view" href="javascript:void(0);">
                                                                            <i class="zmdi zmdi-search icon"></i>
                                                                        </a>
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
                                    <div class="col-12">
                                        <!--== Start Shop Item ==-->
                                        <div class="product-item product-item-list">
                                            <div class="inner-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="product-thumb">
                                                            <a href="single-product-simple.html">
                                                                <img class="w-100" src="assets/img/shop/3.jpg" alt="Image-HasTech">
                                                            </a>
                                                            <span class="sale-title sticker">Sale</span>
                                                            <span class="percent-count sticker">-27%</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product-desc">
                                                            <div class="product-info">
                                                                <h4 class="title"><a href="single-product-simple.html">Style Modern Dress</a></h4>
                                                                <div class="prices">
                                                                    <span class="price">$55.00</span>
                                                                    <span class="price-old">$75.00</span>
                                                                </div>
                                                                <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                                                                <div class="product-action">
                                                                    <div class="addto-wrap">
                                                                        <a class="add-cart" href="cart.html">
                                                                            <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                                                        </a>
                                                                        <a class="add-wishlist" href="wishlist.html">
                                                                            <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                                                        </a>
                                                                        <a class="add-quick-view" href="javascript:void(0);">
                                                                            <i class="zmdi zmdi-search icon"></i>
                                                                        </a>
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
                                </div>
                                <!--== Start Pagination Wrap ==-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination-content-wrap border-top">
                                            <nav class="pagination-nav">
                                                <ul class="pagination justify-content-center">
                                                    <li><a class="disabled active prev" href="shop-list.html">Prev</a></li>
                                                    <li><a class="disabled active" href="shop-list.html">1</a></li>
                                                    <li><a href="shop-list.html">2</a></li>
                                                    <li><a href="shop-list.html">3</a></li>
                                                    <li><a href="shop-list.html">...</a></li>
                                                    <li><a href="shop-list.html">5</a></li>
                                                    <li><a class="next" href="shop-list.html">Next</a></li>
                                                </ul>
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
                                    <form action="#">
                                        <div class="form-group">
                                            <input class="form-control" type="search" placeholder="Search our store">
                                            <button type="submit" class="btn-src"><i class="zmdi zmdi-search"></i></button>
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
                                    <a href="shop.html">Home</a>
                                    <a class="active" href="shop.html">Shop</a>
                                    <a href="shop.html">Products</a>
                                    <a href="shop.html">Blog</a>
                                    <a href="shop.html">Contact</a>
                                    <a href="shop.html">About</a>
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Top Rated Products</h4>
                            <div class="product-sidebar-body">
                                <!--== Start Product Item ==-->
                                <div class="product-sidebar-item">
                                    <div class="thumb">
                                        <a href="single-product-simple.html">
                                            <img class="w-100" src="assets/img/shop/7.jpg" alt="Image-HasTech">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="shop.html">Literature Classical</a></h4>
                                        <div class="product-review">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-price">
                                            <span>$79.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Product Item ==-->

                                <!--== Start Product Item ==-->
                                <div class="product-sidebar-item">
                                    <div class="thumb">
                                        <a href="single-product-simple.html">
                                            <img class="w-100" src="assets/img/shop/19.jpg" alt="Image-HasTech">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="shop.html">Randomised Words</a></h4>
                                        <div class="product-review">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-price">
                                            <span>$39.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Product Item ==-->
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Categories</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-nav-menu">
                                    <a href="shop.html">Best Seller <span>(16)</span></a>
                                    <a href="shop.html">Deal Product <span>(18)</span></a>
                                    <a class="active" href="shop.html">Most view <span>(17)</span></a>
                                    <a href="shop.html">New Arrivals <span>(20)</span></a>
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Vendors</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-nav-menu">
                                    <a href="shop.html">Vendor <span>1</span></a>
                                    <a href="shop.html">Vendor <span>10</span></a>
                                    <a href="shop.html">Vendor <span>11</span></a>
                                    <a href="shop.html">Vendor <span>2</span></a>
                                    <a href="shop.html">Vendor <span>3</span></a>
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Products Types</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-nav-menu">
                                    <a href="shop.html">Type <span>1</span></a>
                                    <a href="shop.html">Type <span>10</span></a>
                                    <a href="shop.html">Type <span>11</span></a>
                                    <a href="shop.html">Type <span>2</span></a>
                                    <a href="shop.html">Type <span>3</span></a>
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Color</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-nav-menu">
                                    <a href="shop.html">red</a>
                                    <a href="shop.html">green</a>
                                    <a href="shop.html">blue</a>
                                    <a href="shop.html">yellow</a>
                                    <a href="shop.html">white</a>
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Size</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-nav-menu">
                                    <a href="shop.html">s</a>
                                    <a href="shop.html">m</a>
                                    <a href="shop.html">l</a>
                                    <a href="shop.html">xl</a>
                                    <a href="shop.html">xxl</a>
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Banner</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-banner">
                                    <a href="shop.html">
                                        <img class="w-100" src="assets/img/shop/banner/6.jpg" alt="Image-HasTech">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--== End Sidebar Item ==-->

                        <!--== Start Sidebar Item ==-->
                        <div class="product-sidebar-item">
                            <h4 class="product-sidebar-title">Tags</h4>
                            <div class="product-sidebar-body">
                                <div class="product-sidebar-tag">
                                    <a href="shop.html">black</a>
                                    <a href="shop.html">blue</a>
                                    <a href="shop.html">fiber</a>
                                    <a href="shop.html">gold</a>
                                    <a href="shop.html">gray</a>
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
