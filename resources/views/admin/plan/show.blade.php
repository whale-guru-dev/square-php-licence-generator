@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="pull-left">
                    <h2>Plan Detail</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('plans.index') }}"> Back</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <p>{{$plan->name}}</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <p>{{$plan->description}}</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Price:</strong>
                            <p>$ {{$plan->price}}</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Term:</strong>
                            <p>{{$plan->term}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
