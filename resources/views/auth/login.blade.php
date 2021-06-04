@extends('layouts.shopifybot-auth')

@section('content')
    <!-- Contact Section Start -->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Login</h2>
                    </div>
                </div>
            </div>
            <div class="row contact-form-area wow fadeInUp justify-content-md-center" data-wow-delay="0.4s">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="contact-block">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" id="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               required data-error="Please enter your email" value="{{ old('email') }}">

                                        @error('email')
                                            <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" placeholder="Password" id="msg_password" name="password"
                                               class="form-control @error('password') is-invalid @enderror" required data-error="Please enter your password">

                                        @error('password')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                        <p class="text-right">Don't Have an account? <a href="{{route('register')}}">Click
                                                Here</a></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button">
                                        <button class="btn btn-common" type="submit">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
