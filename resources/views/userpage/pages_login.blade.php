@extends('master')
@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Login</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('index') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ url('login') }}">Login</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="User/img-fluid" src="User/img/login.jpg" alt="">
                        <div class="hover">
                            <h4>Don't have an account ?</h4>
                            <p>Sign up now!</p>
                            <a class="primary-btn" href="{{ url('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    @if (Session::has('login_status'))
                        <div class="alert alert-danger" style="text-align: center">
                            {{ Session::get('login_status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger" style="text-align: center">
                            @foreach ($errors->all() as $err)
                                {{ $err }}
                                <br>
                            @endforeach
                        </div>
                    @endif

                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>

                        <form class="row login_form" action="login" method="post" id="contactForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            {{-- EMAIL --}}
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>
                            {{-- PASSWORD --}}
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Log In</button>
                                <a href="#">Forgot Password?</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->


@endsection()
