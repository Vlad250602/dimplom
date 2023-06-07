@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> Order #{{$order->id}}.
                    <small class="float-right">Created at: {{$order->created_at}}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-1 invoice-col">
                <address>
                    <strong>Client: </strong><br>
                    <strong>Phone: </strong><br>
                    <strong>Country: </strong><br>
                    <strong>Town: </strong><br>
                    <strong>Address: </strong><br>
                    <strong>Pay type: </strong>
                </address>
            </div>

            <div class="col-sm-2 invoice-col">
                <address>
                    {{$order->name . ' '. $order->surname}}<br>
                    {{$order->phone}}<br>
                    {{$order->country}}<br>
                    {{$order->town}}<br>
                    {{$order->address}}<br>
                    {{$order->pay_type}}
                </address>
            </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Count</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->size}}m</td>
                        <td>{{$item->price}}₴</td>
                        <td>{{$item->count}}</td>
                        <td>{{number_format($item->count * $item->price,2, '.', '')}}₴</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-7">
            </div>

            <!-- /.col -->
            <div class="col-5">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Total:</th>
                            <td>{{$total->sum('price')}}₴</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <form action="{{route('admin-orders-complete' , $order->id)}}" method="post">
                    @csrf
                @if ($order->status !== 'processed')
                <button type="submit" class="btn btn-secondary float-right"><i class="far fa-check-circle"></i> Mark as completed
                </button>
                @else
                <button type="submit" class="btn btn-success float-right"><i class="far fa-check-circle"></i> Mark as completed
                </button>
                @endif
                </form>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
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
