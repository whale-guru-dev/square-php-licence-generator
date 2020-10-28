@extends('layouts.shopifybot-auth')

@section('content')
    <!-- Contact Section Start -->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Sign Up</h2>
                    </div>
                </div>
            </div>
            <div class="row contact-form-area wow fadeInUp justify-content-md-center" data-wow-delay="0.4s">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="contact-block">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}" placeholder="Name" required data-error="Please enter your name">

                                        @error('name')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required data-error="Please enter your email">

                                        @error('email')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="password" type="password" placeholder="Password" id="msg_subject" class="form-control @error('password') is-invalid @enderror" required data-error="Please enter your password">

                                        @error('password')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="password_confirmation" type="password" placeholder="Password" id="msg_subject" class="form-control" required data-error="Please enter your password">

                                        <p class="text-right">Already have an account? <a href="{{route('login')}}">Click Here</a></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button">
                                        <button class="btn btn-common" type="submit">Submit</button>
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
