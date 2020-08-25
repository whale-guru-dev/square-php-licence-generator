@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="pull-left">
                    <h2>Add New Plan</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('plans.index') }}"> Back</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <form id="form" method="POST" action="{{ route('plans.update',$plan->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" value="{{$plan->name}}" class="form-control" placeholder="Plan Name"/>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <input type="text" name="description" value="{{$plan->description}}" class="form-control" placeholder="Plan Description"/>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <input class="form-control" value="{{$plan->price}}" type="text" name="price" placeholder="Price"/>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Term:</strong>
                                <input class="form-control" value="{{$plan->term}}" type="text" name="term" placeholder="Term"/>
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
