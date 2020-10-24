@extends('layouts.user')

@section('content')
    <div class="container">

        <div class="starter-template">
            <h1>Run Bot</h1>
            <p class="lead">Please input fields.</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{route('user.bot')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="zillow_username" class="col-md-4 col-form-label text-md-right">Zillow Username</label>

                        <div class="col-md-8">
                            <input id="zillow_username" type="text" class="form-control @error('zillow_username') is-invalid @enderror" name="zillow_username"
                                   @if(Auth::user()->botInfoForUser && Auth::user()->botInfoForUser->zillow_username) readonly @endif
                                value="@if(Auth::user()->botInfoForUser &&  Auth::user()->botInfoForUser->zillow_username) {{Auth::user()->botInfoForUser->zillow_username}} @endif"
                                   required>

                            @error('zillow_username')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zillow_password" class="col-md-4 col-form-label text-md-right">Zillow Password</label>

                        <div class="col-md-8">
                            <input id="zillow_password" type="text" class="form-control @error('zillow_password') is-invalid @enderror" name="zillow_password"
                                   @if(Auth::user()->botInfoForUser && Auth::user()->botInfoForUser->zillow_password) readonly @endif
                                   value="@if(Auth::user()->botInfoForUser && Auth::user()->botInfoForUser->zillow_password) {{Auth::user()->botInfoForUser->zillow_password}} @endif"
                                   required>

                            @error('zillow_password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num_msg" class="col-md-4 col-form-label text-md-right">Number of Messages to Reply</label>

                        <div class="col-md-8">
                            <input id="num_msg" type="number" class="form-control @error('num_msg') is-invalid @enderror" name="num_msg" required>

                            @error('num_msg')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pre_msg" class="col-md-4 col-form-label text-md-right">Predefined Message</label>

                        <div class="col-md-8">
                            <textarea id="pre_msg" class="form-control @error('pre_msg') is-invalid @enderror" name="pre_msg" required></textarea>

                            @error('pre_msg')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exclusive_words" class="col-md-4 col-form-label text-md-right">Exclusive words</label>

                        <div class="col-md-8">
                            <textarea id="exclusive_words" class="form-control @error('exclusive_words') is-invalid @enderror" name="exclusive_words" required></textarea>

                            @error('exclusive_words')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-6">
                            <button type="submit" class="bt-text-area download-btn">
                                Run
                            </button>
                        </div>

                        <div class="col-md-6">
                            <button type="button" class="bt-text-area download-btn" id="changeAccountBtn">
                                Request for Changing Zillow Account Setting
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form method="post" action="{{route('user.request.zillow')}}" id="change_zillow_account" style="display: none;">
        @csrf
    </form>


@endsection

@section('js')
    <script>
        $( "#changeAccountBtn" ).click(function () {
            $("#change_zillow_account").submit();
        });
    </script>
@endsection
