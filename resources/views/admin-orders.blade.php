@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1 class="text-black-50" style=" display: inline">Products</h1>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">

                    {{--
                    <a href=""><button class="btn btn-block btn-primary" style=" width: 150px; margin-top: -5px; z-index: 100">Add product</button></a>
--}}
                    <table id="productTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Order id</th>
                            <th>Created by</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Country</th>
                            <th>Town</th>
                            <th>Address</th>
                            <th>Pay type</th>
                            <th>Created at</th>
                            <th>Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$users->where('id', $order->user_id)->first()->name
                                    . ' ' .  $users->where('id', $order->user_id)->first()->surname}}</td>
                                @if ($order->status == 'completed')
                                    <td style="color: limegreen">{{$order->status}}</td>
                                @elseif ($order->status == 'processed')
                                    <td style="color: #f1c40f">{{$order->status}}</td>
                                @else
                                    <td>{{$order->status}}</td>
                                @endif
                                <td>{{$order->name}}</td>
                                <td>{{$order->surname}}</td>
                                <td>{{$order->country}}</td>
                                <td>{{$order->town}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->pay_type}}</td>
                                <td>{{$order->created_at}}</td>
                                <td style="text-align: center">
                                    <a href="/admin-orders/details/{{$order->id}}">
                                        <button class="btn btn-block btn-outline-secondary">
                                            <i class="nav-icon fas fa-info"></i>
                                        </button>
                                    </a>
                                    </a>
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
