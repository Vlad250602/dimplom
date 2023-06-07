@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="col-sm-6">
        <h1 class="text-black-50">Create product</h1>
    </div>
    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        {{--<div class="card-body">
            <div class="form-group">
                <label for="exampleInputFile" style="width: 100%">Photo</label>
                <img id="preview-image-before-upload" src="{{ Storage::url('image/employees/origin/'.'emp_placeholder.png') }}" style="margin-bottom: 10px; border: 2px dotted gray; width: 300px; height: 300px; background-size: cover">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                </div>
                @if ($errors->has('photo'))
                    <label style="color: red">File format jpg,png up to 5MB, minimum 300x300px</label>
                @else
                    <label>File format jpg,png up to 5MB, minimum 300x300px</label>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                @if ($errors->has('name'))
                    <input type="tel"  name="name" class="form-control" style="border: 2px solid red" id="name" placeholder="Enter name">
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @else
                    <input type="tel"  name="name" class="form-control" id="name" placeholder="Enter name">
                @endif
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                @if ($errors->has('phone'))
                    <input type="text" name="phone" data-tel-input  style="border: 2px solid red" class="form-control art-stranger" placeholder="+38 (###) ### ## ##" id="phone" >
                    <span class="help-block">
                        <strong>Invalid phone</strong>
                    </span>
                @else
                    <input type="text" name="phone" data-tel-input  class="form-control art-stranger" placeholder="+38 (###) ### ## ##" id="phone" >
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                @if ($errors->has('email'))
                    <input type="email" name="email" class="form-control" style="border: 2px solid red" id="email" placeholder="Enter email">
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @else
                    <input type="email" name="email" class="form-control"  id="email" placeholder="Enter email">
                @endif
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <select name="position" class="form-control">
                    @foreach($all_pos as $pos)
                        <option>{{$pos->pos_name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="salary">Salary, $</label>
                @if ($errors->has('salary'))
                    <input type="text" name="salary" class="form-control" style="border: 2px solid red" id="salary"  placeholder="Enter salary">
                    <span class="help-block">
                        <strong>Maximum 500.00</strong>
                    </span>
                @else
                    <input type="text" name="salary" class="form-control" id="salary"  value=0 placeholder="Enter salary">
                @endif
            </div>
            <div class="form-group">
                <label for="head">Head</label>
                @if ($errors->has('head'))
                    <input type="text" name="head" class="form-control" style="border: 2px solid red" id="salary" id="head"  placeholder="Enter head">
                    <span class="help-block">
                        <strong>There is no person in the database or person is himself</strong>
                    </span>
                @else
                    <input type="text" name="head" class="form-control" id="head"  placeholder="Enter head">
                @endif
            </div>
            <div class="form-group">
                <label for="emp_date">Date of employment</label>
                @if ($errors->has('emp_date'))
                    <input type="date" name="emp_date" class="form-control" id="emp_date" style="border: 2px solid red" placeholder="Enter date">
                    <span class="help-block">
                        <strong>Date of employment field is required</strong>
                    </span>
                @else
                    <input type="date" name="emp_date" class="form-control" id="emp_date" placeholder="Enter date">
                @endif
            </div>

        </div>--}}
        <!-- /.card-body -->
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputFile" >Photo</label><br>
                <img id="preview-image-before-upload" src="" style="margin-bottom: 10px; border: 2px dotted gray; width: 300px; height: 300px; background-size: cover">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" value="" name="photo">
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Product name</label>
                <input type="text" name="name" class="form-control" id="name"
                       @if ($errors->has('name'))
                           value="{{old('name')}}"
                       style="border: 1px solid red"
                       @endif
                       placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="size">Product size</label>
                <input type="text" name="size" class="form-control" id="size"
                       @if ($errors->has('size'))
                           value="{{old('size')}}"
                       style="border: 1px solid red"
                       @endif
                       placeholder="Enter size">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" id="price"
                       @if ($errors->has('price'))
                           value="{{old('price')}}"
                       style="border: 1px solid red"
                       @endif
                       placeholder="0">
            </div>
            <div class="form-group">
                <label for="discount">Discount,%</label>
                <input type="text" name="discount" class="form-control" id="discount"
                       @if ($errors->has('discount'))
                           value="{{old('discount')}}"
                       style="border: 1px solid red"
                       @else
                           value="0"
                       @endif

                       placeholder="0">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control">
                    <option value="-1">---</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="textarea" name="description" class="form-control" id="description"
                          placeholder="Description">@if ($errors->has('description')){{old('description')}}@endif</textarea>
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
