@extends('ad_master')
@section('ad_content')
    <div class="main-wrapper">
        <div class="app" id="app" style="padding-top: 10%">

            @if (count($errors) > 0)
                <div class="alert alert-danger" style="text-align: center">
                    @foreach ($errors->all() as $err)
                        {{ $err }}
                        <br>
                    @endforeach
                </div>
            @endif
            @if (Session::has('change_pwd_error'))
                <div class="alert alert-danger" style="text-align: center">{{ Session::get('change_pwd_error') }}</div>
            @endif

            <form name="item" method="POST" action="password_edit" >
                <div class="card card-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{-- Old Password --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Old Password: </label>
                        <div class="col-sm-10">
                            <input type="password" name="old_pwd" id="old_pwd" class="form-control boxed" placeholder="ĐIỀN CHO CÓ =))">
                        </div>
                    </div>

                    {{-- New Password --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> New Password: </label>
                        <div class="col-sm-10">
                            <input type="password" name="new_pwd" id="new_pwd" class="form-control boxed">
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right"> Confirm Password: </label>
                        <div class="col-sm-10">
                            <input type="password" name="re_pwd" id="re_pwd" class="form-control boxed">
                        </div>
                    </div>

                    {{-- Button --}}
                    <div class="form-group row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary" name="action" value="">
                                Save </button>
                            <button type="button" class="btn btn-secondary"> <a href="{{ url('user_edit') }}"
                                    style="text-decoration: none;">Back
                                </a></button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection()
