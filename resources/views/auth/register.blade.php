@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="logo text-center">
            <a href="/"><img src="{{ asset('assets/logo.png') }}" width="50%"/></a>
        </div>

        <div class="row">
            <div class="col-md-12  step-row">
                <h2 class="h2">Step 1.</h2>
                <h6 class="h6 step-content">Download Zillow AR and Obtain Mac Address</h6>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2 class="h2" style="text-align: center;">
                    <span style="color: rgb(231, 76, 60); -webkit-text-fill-color: rgb(231, 76, 60);">DO NOT DOWNLOAD UNTIL YOU WATCH THE "</span>HOW TO DOWNLOAD VIDEO<span style="color: rgb(231, 76, 60); -webkit-text-fill-color: rgb(231, 76, 60);">"</span></h2>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="759px" height="553px" src="https://www.youtube.com/embed/1sfGOrN33Q4?&playlist=1sfGOrN33Q4&loop=1&controls=0&start=0&end=0&playlist=1sfGOrN33Q4&loop=1&autoplay=1&mute=0&controls=0&start=0&end=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" style="border-radius: 0px; border: 0px none rgb(0, 0, 0);"></iframe>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h6 class="h6">
                    <span style="color: rgb(231, 76, 60); -webkit-text-fill-color: rgb(231, 76, 60);"><strong>Do Not Click Download Until You Watch The How To Download Video</strong></span>
                </h6>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="https://" rel="noreferrer" target="_blank" class="bt-text-area download-btn">DOWNLOAD ZILLOW AR</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12  step-row">
                <h2 class="h2">Step 2.</h2>
                <h6 class="h6 step-content">Return To This Page, Fill Out Form & Complete Registration</h6>
            </div>
        </div>

        <br/>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <input id="mac" type="text" class="form-control @error('mac') is-invalid @enderror" name="mac" value="{{ old('mac') }}" required autocomplete="mac">

                            @error('mac')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="col-md-12">
                            If you already have an account, please <a href="{{route('login')}}">log in</a> here.
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 footer-contact-info">
                    <p class="text-uppercase blue-text footer-contact-info_title">CONTACT US</p>

                    <p class="footer-contact-info_content">26, Lane Street New York, USA</p>

                    <p class="footer-contact-info_content">9AM - 7PM Mon - Sat</p>

                    <p class="footer-contact-info_content">info@company.net +55 11 3256.9856</p>
                </div>
            </div>
        </div>
    </section>
@endsection
