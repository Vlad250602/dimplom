@extends('layouts.main-layout')

@section('content')
    <div class="page-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb">
                                <li><a href="{{route('main')}}">Home</a></li>
                                <li class="breadcrumb-sep">/</li>
                                <li>contact</li>
                            </ul>
                        </nav>
                        <h4 class="title">contact</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-info-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="contact-info-item">
                        <h4>CONTACT DIRECTLY</h4>
                        <p>info@example.com</p>
                        <p>+380969921250</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-info-item">
                        <h4>VISIT OUR OFFICE</h4>
                        <p>95 Shevchenka st </p>
                        <p>VIC 14030,</p>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-0">
                    <div class="contact-info-item">
                        <h4>WORK WITH US</h4>
                        <p>Send your CV to our email:</p>
                        <p>career@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Contact Info Area Wrapper ==-->

    <!--== Start Contact Area Wrapper ==-->
@endsection
