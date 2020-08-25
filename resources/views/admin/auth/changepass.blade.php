@extends('admin.layout.master')

@section('styles')
    <style>
        .help-block {
            color: red;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Change Password</span>
                    </div>

                </div>
                <div class="row">
                    <div class="portlet-body">

                        <form class="login-form" role="form" method="POST" action="{{ route('profile.update') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label visible-ie8 visible-ie9">Admin Name</label>
                                <input id="name" type="text"
                                       class="form-control form-control-solid placeholder-no-fix" name="name"
                                       placeholder="Admin Name" value="{{Auth::guard('admin')->user()->name}}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="control-label visible-ie8 visible-ie9">Admin Username</label>
                                <input id="username" type="text"
                                       class="form-control form-control-solid placeholder-no-fix" name="username"
                                       placeholder="Admin Username" value="{{Auth::guard('admin')->user()->username}}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label visible-ie8 visible-ie9">Admin Email</label>
                                <input id="email" type="email"
                                       class="form-control form-control-solid placeholder-no-fix"
                                       name="email" placeholder="Admin Email"
                                       value="{{Auth::guard('admin')->user()->email}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn green uppercase">Change Profile</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body">

                        <form class="login-form" role="form" method="POST" action="{{ route('password.update') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Old Password</label>
                                <input id="passwordold" type="password"
                                       class="form-control form-control-solid placeholder-no-fix" name="passwordold"
                                       placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">New Password</label>
                                <input id="password" type="password"
                                       class="form-control form-control-solid placeholder-no-fix" name="password"
                                       placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                                <input id="password-confirm" type="password"
                                       class="form-control form-control-solid placeholder-no-fix"
                                       name="password_confirmation" placeholder="Confirm Password">
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn green uppercase">Change Password</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection