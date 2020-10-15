@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="pull-left">
                    <h2>Add New User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users') }}"> Back</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <form id="form" method="POST" action="{{ route('users.create') }}">
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" autofocus/>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus/>
                            </div>
                        </div>

{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>Mac Address:</strong>--}}
{{--                                <input class="form-control" type="text" name="mac" placeholder="Mac Address" value="{{ old('mac') }}" autofocus/>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Password:</strong>
                                <input class="form-control" type="password" name="password" placeholder="Password" />
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Plan:</strong>
                                <select name="plan" class="form-control">
                                    @foreach($plans as $plan)
                                    <option value="{{$plan->id}}">{{$plan->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
