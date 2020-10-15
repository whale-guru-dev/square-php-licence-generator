@extends('layouts.user')

@section('content')
    <div class="container">

        <div class="starter-template">
            <h1>Run Bot</h1>
            <p class="lead">Please input fields.</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Zillow Username</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="zil-username" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Zillow Password</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="zil-pass" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Number of Messages of Reply</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="num-msg" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Predefined Message</label>

                        <div class="col-md-8">
                            <textarea class="form-control" name="pre-msg" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Exclusive words</label>

                        <div class="col-md-8">
                            <textarea class="form-control" name="exclusive-words" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Button</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="button" required>
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
