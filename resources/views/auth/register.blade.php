@extends('layouts.main-layout')

@section('content')
    <main class="main-content">
        <!--== Start Page Header Area Wrapper ==-->
        <div class="page-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="page-header-content">
                            <nav class="breadcrumb-area">
                                <ul class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-sep">/</li>
                                    <li>Account</li>
                                </ul>
                            </nav>
                            <h4 class="title">Account</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Account Area Wrapper ==-->
        <section class="account-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 m-auto">
                        <div class="account-form-wrap">
                            <!--== Start Register Form ==-->
                            <div class="login-form">
                                <div class="content">
                                    <h4 class="title">Registration</h4>
                                    <p>Please register using account detail bellow.</p>
                                </div>
                                {{-- @if ($errors)
                                     <ul>
                                         @foreach ($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                         @endforeach
                                     </ul>
                                 @endif--}}
                                <form method="post" action="{{ url('/register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input value="{{ old('name') }}" name="name" type="text" placeholder="First name"
                                                       class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                <div style="color: lightcoral">Name incorrect</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <input value="{{ old('surname') }}" name="surname" type="text" placeholder="Second name"
                                                       class="form-control @error('surname') is-invalid @enderror">
                                                @error('surname')
                                                <div style="color: lightcoral">Surname incorrect</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <input value="{{ old('email') }}" name="email" type="email" placeholder="Email"
                                                       class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                <div style="color: lightcoral">Email incorrect</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Password"
                                                       class="form-control @error('password') is-invalid @enderror">
                                                @error('password')
                                                <div style="color: lightcoral">Password incorrect</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" class="form-control"
                                                       placeholder="Retype password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="login-form-group">
                                                <button class="btn-sign" type="submit">Sign Up</button>
                                                <a class="btn-pass-forgot" href="{{ route('login') }}">Already have account?</a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!--== End Login Form ==-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Account Area Wrapper ==-->
    </main>
@endsection
