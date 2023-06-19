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
                                <li>wishlist</li>
                            </ul>
                        </nav>
                        <h4 class="title">wishlist</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-area product-wishlist-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-wishlist-table table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumb">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-stock-status">Stock Status</th>
                                <th class="product-price">Price</th>
                                <th class="product-action">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist as $item)
                            <tr class="cart-wishlist-item">
                                <td class="product-remove">
                                    <form action="{{route('wishlist-remove', $item->id)}}" method="post">
                                        @csrf
                                        <button type="submit" style="border: 0; background: 0"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                                <td class="product-thumb">
                                    <a href="{{route('product-details', $item->product_id)}}">
                                        <img style="width: 90px; height: 90px" src="{{($item->image)? Storage::url('image/products/' . $item->image) : asset('img/shop/product-mini/1.jpg')}}" alt="Image-HasTech">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <h4 class="title"><a href="{{route('product-details', $item->product_id)}}">{{ $item->product_name . ' ' . $item->size . 'm'}}</a></h4>
                                </td>
                                <td class="product-stock-status">
                                    @if($item->count > 0)
                                        <span class="stock">In stock </span>
                                    @else
                                        <span class="stock-out">Out of stock </span>
                                    @endif
                                </td>
                                <td class="product-price">
                                    <span class="price">@if($item->discount_price == 0){{$item->price}}₴ @else {{$item->discount_price}}₴@endif</span>
                                </td>
                                <td class="product-action">
                                    <form action="{{route('cart-add', $item->product_id)}}" method="post">
                                        @csrf
                                    <button class="btn-cart">Add to cart</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
