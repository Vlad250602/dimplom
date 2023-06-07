@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="col-sm-6">
        <h1 class="text-black-50">Create slider</h1>
    </div>
    <form action="{{route('admin-sliders-create-submit')}}" enctype="multipart/form-data" method="post">
        @csrf
        <!-- /.card-body -->
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputFile" >Image</label><br>
                <img id="preview-image-before-upload" src="" style="margin-bottom: 10px; border: 2px dotted gray; width: 960px; height: 400px; background-size: cover">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" value="" name="photo">
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="product_id">Product</label>
                <select name="product_id" class="form-control" id="product_id">
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->product_name . ' ' . $product->size . 'm.'}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description"
                       @if ($errors->has('description'))
                           value="{{old('description')}}"
                       style="border: 1px solid red"
                       @endif
                       placeholder="Enter description">
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
    {{--<script>
        var phoneMask = IMask(
            document.getElementById('phone'), {
                mask: '+{38} (000) 000 00 00'
            });
    </script>
    --}}
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
