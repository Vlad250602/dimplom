@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1 class="text-black-50" style=" display: inline">Products</h1>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                        <a class="btn btn-primary" href="admin-products/create" style="margin-bottom: 10px">
                            Add product
                        </a>
                    {{--
                    <a href=""><button class="btn btn-block btn-primary" style=" width: 150px; margin-top: -5px; z-index: 100">Add product</button></a>
--}}
                    <table id="productTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount price</th>
                            <th>Total sales</th>
                            <th>Count</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $product)
                            <tr>
                                <td style="text-align: center"><img style="max-height: 40px; max-width: 40px; " src="{{ Storage::url('image/products/'. $product->image) }}" alt=""></td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->size}}m</td>
                                <td>{{$categories->find($product->category_id)->category_name }}</td>
                                <td>{{$product->price}}</td>
                                <td>{{number_format($product->discount_price,2  )}}</td>
                                <td>{{$product->total_sales}}</td>
                                <td>{{$product->count}}</td>
                                <td style="text-align: center">
                                    <a href="/admin-products/edit-count/{{$product->id}}">
                                        <button class="btn btn-block btn-outline-info" style="width:20%; display: inline-block">
                                            <i class="nav-icon fas fa-calendar"></i>
                                        </button>
                                    </a>
                                    <a href="/admin-products/details/{{$product->id}}">
                                        <button class="btn btn-block btn-outline-secondary" style="width:20%; display: inline-block">
                                            <i class="nav-icon fas fa-info"></i>
                                        </button>
                                    </a>
                                    <a href="/admin-products/edit/{{$product->id}}">
                                        <button class="btn btn-block btn-outline-primary" style="width:20%; display: inline-block">
                                            <i class="nav-icon fas fa-pen"></i>
                                        </button>
                                    </a>
                                    <a href="/admin-products/delete/{{$product->id}}">
                                        <button class="btn btn-block btn-outline-danger"  style="width:20%; display: inline-block" >
                                            <i class="nav-icon fas fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <div style="margin-top: 10px; float: right">
                        {{$data->withQueryString()->links()}}
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
        </div>
    </section>

    <!-- /.content -->
@endsection

@push('page_scripts')
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <scrgitipt src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></scrgitipt>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- Page specific script -->

@endpush
