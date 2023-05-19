@extends('layouts.main-layout')

@section('content')
        <!--== Start Page Header Area Wrapper ==-->
        <div class="page-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="page-header-content">
                            <h4 class="title mt-0">Your Shopping Cart</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="product-area shopping-cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="shopping-cart-wrap">
                            <div class="cart-table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="indecor-product-remove">Remove</th>
{{--                                        <th class="indecor-product-thumbnail">Image</th>--}}
                                        <th class="indecor-product-name">Product</th>
                                        <th class="indecor-product-price">Price</th>
                                        <th class="indecor-product-quantity">Quantity</th>
                                        <th class="indecor-product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $item)
                                    <tr>
                                        <td class="indecor-product-remove">
                                            <a href="#/"><i class="fa fa-times"></i></a>
                                        </td>
{{--                                        <td class="indecor-product-thumbnail">
                                            <a href="#/"><img src="assets/img/shop/cart/table1.jpg" alt="Image-HasTech"></a>
                                        </td>--}}
                                        <td class="indecor-product-name">
                                            <h4 class="title"><a href="/">{{$item->product_name}}</a></h4>
                                        </td>
                                        <td class="indecor-product-price"><span class="price">{{$item->price}}₴</span></td>
                                        <td class="indecor-product-quantity">
                                            <div class="pro-qty">
                                                <input type="text" id="quantity" title="Quantity" value="{{$item->count}}">
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="price">{{number_format($item->count * $item->price, 2, '.', '')}}₴</span></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-7 col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <a class="button" href="{{route('catalog')}}">Continue Shopping</a>
                                            <a class="button" href="#/">Clear Cart</a>
                                            <div class="cart-coupon">
                                                <h3>Special instructions for seller</h3>
                                                <label for="Textarea1" class="form-label visually-hidden">Instructions Seller</label>
                                                <textarea class="form-control" id="Textarea1"></textarea>
                                            </div>
                                        </div>
                                        <div class="coupon2">
                                            <a class="button" href="#/">Update Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-5 col-12">
                                    <div class="cart-page-total">
                                        <h3>Cart Total</h3>
                                        <ul>
                                            <li>Total <span class="money">{{number_format($total->sum('price'), 2, '.', '')}}</span></li>
                                        </ul>
                                        <a class="proceed-to-checkout-btn" href="{{route('checkout')}}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Product Area Wrapper ==-->
@endsection
