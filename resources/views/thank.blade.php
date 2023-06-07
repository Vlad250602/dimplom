@extends('layouts.main-layout')

@section('content')
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <h4 class="title">Thank you for purchase!</h4>
                        <h4 class="title">Your order #{{$id->id}}</h4>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb">
                                <li><a href="{{route('main')}}">Return to home</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
