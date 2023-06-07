@extends('layouts.app')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                        <div class="col-12">
                            <img src="{{Storage::url('image/products/'. $product->image)}}" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{$product->product_name}}</h3>
                        <hr>
                        <h4 class="mt-3">Size: <small>{{$product->size}}m</small></h4>
                        <h4 class="mt-3">Count: <small>{{$product->count}}</small></h4>
                        <h4 class="mt-3">Total sales: <small>{{$product->total_sales}}</small></h4>
                        <h4 class="mt-3">Category: <small>{{{$categories->find($product->category_id)->category_name }}}</small></h4>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                {{$product->price}}UAH
                            </h2>
                            <h4 class="mt-0">
                                <small>Discount: {{$product->discount}}%</small>
                            </h4>
                        </div>
                        <h4 class="mt-3">Created: <small>{{$product->created_at}}</small></h4>
                        <h4 class="mt-3">Updated: <small>{{$product->updated_at}}</small></h4>
                        <h4 class="mt-3">Created by: <small>{{{$admins->find($product->admin_created_id)->name }}}</small></h4>
                        <h4 class="mt-3">Updated by: <small>{{{$admins->find($product->admin_updated_id)->name }}}</small></h4>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$product->description}}</div>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
