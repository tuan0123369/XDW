@extends('ad_master')
@section('ad_content')
    <div class="main-wrapper" style="padding-left:2%; padding-top: 5%;">
        <div class="app row" id="app">

            <div class="col-2">
                <h3 >User ID</h3>
                <hr>
                <h3 >Email</h3>
                <hr>
                <h3 >User Name</h3>
                <hr>
                <h3 >Address</h3>
                <hr>
                <h3 >Phone Number</h3>
                <hr>
                {{-- <h3 >Avatar</h3> --}}
                {{-- <h3 h3>Password</h3> --}}

            </div>
            <div class="col-8" style="text-align: center">
                <h3>{{Session::get('user_id')}}</h3>
                <hr>
                <h3>{{Session::get('user_email')}}</h3>
                <hr>
                <h3>{{Session::get('user_name')}}</h3>
                <hr>
                <h3>{{Session::get('user_address')}}</h3>
                <hr>
                <h3>{{Session::get('user_phone')}}</h3>
                <hr>
                {{-- <h3>{{ Session::get('user_avatar') }}</h3>
                <img src="img/avatar/{{ Session::get('user_avatar') }}" width="70px" height="70px"> --}}

    
            </div>
        </div>
    </div>
@endsection
