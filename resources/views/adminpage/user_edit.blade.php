@extends('ad_master')
@section('ad_content')
    <div class="main-wrapper">
        <div class="app" id="app">

            <form name="item" method="POST" action="user_edit" style="padding-top: 10%">
                <div class="card card-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{-- User name --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Username: </label>
                        <div class="col-sm-10">
                            <input type="text" name="user_name" id="user_name" class="form-control boxed" 
                            value="{{Session::get('user_name')}}">
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Phone Number: </label>
                        <div class="col-sm-10">
                            <input type="number" name="phone" id="phone" min=0 class="form-control boxed" 
                            value="{{Session::get('user_phone')}}">
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Address: </label>
                        <div class="col-sm-10">
                            <input type="text" name="address" id="address" class="form-control boxed" 
                            value="{{Session::get('user_address')}}">
                        </div>
                    </div>

                    {{-- Avatar --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Avatar: </label>
                        <div class="col-sm-10">
                            <div class="images-container">
                                <input type="file" name="img">
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Email: </label>
                        <div class="col-sm-10">
                            <input readonly type="email" name="email" id="email" class="form-control boxed" 
                            value="{{Session::get('user_email')}}">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Password: </label>
                        <div class="col-sm-10">
                            {{-- <input type="button" href="{{url('user_detail')}}" value="Change Password"> --}}
                            <button type="button" class="btn btn-secondary"> <a href="{{url('password_edit')}}" style="text-decoration: none;">Change Password
                            </a></button>
                            @if (Session::has('change_pwd_status'))
                                <div class="alert alert-success" style="text-align: center">{{ Session::get('change_pwd_status') }}</div>
                            @endif
                        </div>
                       

                    </div>

                    {{-- Button --}}
                    <div class="form-group row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary" name="action" value="">
                                Save </button>
                            <button type="button" class="btn btn-secondary"> <a href="{{url('user_detail')}}" style="text-decoration: none;">Back
                                </a></button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection()
