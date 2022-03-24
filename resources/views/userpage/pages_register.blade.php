@extends('master')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('index') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ url('register') }}">Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Login Box Area =================-->

    <section class="login_box_area section_gap">
        <div class="container">

            @if (Session::has('register_status'))
                <div class="alert alert-success" style="text-align: center">{{ Session::get('register_status') }}</div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger" style="text-align: center">
                    @foreach ($errors->all() as $err)
                        {{ $err }}
                        <br>
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <div class="login_form_inner">
                        <h3>Register</h3>
                        <form class="row login_form" action="register" method="post" id="contactForm"
                            style="padding-bottom: 10%">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            {{-- Tên user --}}
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                    placeholder="Full Name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Full Name'">
                            </div>
                            {{-- Địa chỉ --}}
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
                            </div>
                            {{-- Số điện thoại --}}
                            <div class="col-md-12 form-group">
                                <input type="number" class="form-control" id="phone" name="phone"
                                    placeholder="Phone Number" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Phone Number'">
                            </div>
                            {{-- Email ( tài khoản đăng nhập ) --}}
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>
                            {{-- Mật khẩu đăng nhập --}}
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                            </div>
                            {{-- Điền lại mật khẩu --}}
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="re_password" name="re_password"
                                    placeholder="Re Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Re Password'">
                            </div>
                            {{-- Nút submit --}}
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn" name="btn_submit">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->
@endsection()
