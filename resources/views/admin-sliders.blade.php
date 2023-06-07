@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1 class="text-black-50" style=" display: inline">Products</h1>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('admin-sliders-create')}}" style="margin-bottom: 10px">
                        Add slider
                    </a>
                    {{--
                    <a href=""><button class="btn btn-block btn-primary" style=" width: 150px; margin-top: -5px; z-index: 100">Add product</button></a>
--}}
                    <table id="productTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Product id</th>
                            <th>Product</th>
                            <th>Discount price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $slider)
                            <tr>
                                <td>{{$slider->slider_id}}</td>
                                <td>{{$slider->product_name}}</td>
                                <td>{{$slider->discount_price}}</td>
                                <td>{{intval(100 - $slider->discount_price / $slider->price * 100)}}%</td>
                                @if ($slider->status == 'active')
                                    <td style="color: limegreen">{{$slider->status}}</td>
                                @else
                                    <td style="color: orangered">{{$slider->status}}</td>
                                @endif

                                    <td>{{$slider->slider_description}}</td>
                                <td>
                                    <a href="{{route('admin-sliders-status', $slider->slider_id)}}">Status</a>
                                    <a href="{{route('admin-sliders-destroy', $slider->slider_id)}}">Delete</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <div style="margin-top: 10px; float: right">
                        {{$data->links()}}
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
