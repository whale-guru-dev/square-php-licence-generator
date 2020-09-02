@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>Profile Information</h1>
            <p class="lead">Please Check your profile.</p>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Update Information</h2>
                <form method="POST" action="{{ route('user.update.profile') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mac Address') }}</label>

                        <div class="col-md-6">
                            <input id="mac" type="text" class="form-control @error('mac') is-invalid @enderror" name="mac" value="{{ $user->mac }}" required autocomplete="mac">

                            @error('mac')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            <button type="submit" class="bt-text-area download-btn">
                                Update Profile
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{route('user.update.password')}}" method="POST" >
                    @csrf
                    <h2>Update Password</h2>
                    <div class="form-group row">
                        <label for="old_password" class="col-md-4 col-form-label text-md-right">Old Password</label>

                        <div class="col-md-6">
                            <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>

                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            <button type="submit" class="bt-text-area download-btn">
                                Update Password
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
