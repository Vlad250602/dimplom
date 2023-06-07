@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="col-sm-6">
        <h1 class="text-black-50">Changing count</h1>
    </div>
    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <!-- /.card-body -->

        <div class="card-body">
            <div class="form-group">
                <label for="name">Count</label>
                <input type="text" name="count" class="form-control"
                       id="count" value="{{$product->count}}" placeholder="Enter count">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @if ($errors)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection

@push('page_scripts')
    <script>
        var phoneMask = IMask(
            document.getElementById('phone'), {
                mask: '+{38} (000) 000 00 00'
            });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function (e) {


            $('#photo').change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
@endpush
