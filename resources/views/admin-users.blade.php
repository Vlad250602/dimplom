@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1 class="text-black-50" style=" display: inline">Users</h1>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    {{--
                    <a href=""><button class="btn btn-block btn-primary" style=" width: 150px; margin-top: -5px; z-index: 100">Add product</button></a>
--}}
                    <table id="productTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $user)
                            <tr>
                                <td style="text-align: center"><img style="max-height: 40px; max-width: 40px; border-radius: 20px" src="{{ Storage::url('image/'. $user->name . '_'. $user->surname . '/') }}" alt=""></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if($user->admin == 0)
                                        User
                                    @else
                                        Admin
                                    @endif</td>
                                <td style="text-align: center">
                                    <a href="/admin-users/details/{{$user->id}}">
                                        <button class="btn btn-block btn-outline-secondary" style=" width:30%; display: inline-block">
                                            <i class="nav-icon fas fa-info"></i>
                                        </button>
                                    </a>
                                    <a href="/admin-products/delete/{{$user->id}}">
                                        <button class="btn btn-block btn-outline-danger"  style=" width:30%; display: inline-block" >
                                            <i class="nav-icon fas fa-trash"></i>
                                        </button>
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
