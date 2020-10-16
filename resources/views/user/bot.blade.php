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
                        <label for="zil_username" class="col-md-4 col-form-label text-md-right">Zillow Username</label>

                        <div class="col-md-8">
                            <input id="zil_username" type="text" class="form-control @error('zil_username') is-invalid @enderror" name="zil_username" required>

                            @error('zil_username')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zil_pass" class="col-md-4 col-form-label text-md-right">Zillow Password</label>

                        <div class="col-md-8">
                            <input id="zil_pass" type="text" class="form-control @error('zil_pass') is-invalid @enderror" name="zil_pass" required>

                            @error('zil_pass')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="num_msg" class="col-md-4 col-form-label text-md-right">Number of Messages of Reply</label>

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

                    <div class="form-group row">
                        <label for="button" class="col-md-4 col-form-label text-md-right">Button</label>

                        <div class="col-md-8">
                            <input id="button" type="text" class="form-control @error('button') is-invalid @enderror" name="button" required>

                            @error('button')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            <button type="submit" class="bt-text-area download-btn">
                                Run
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
