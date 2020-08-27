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
                    <form id="form" method="POST" action="{{ route('plans.store') }}">
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Plan Name" value="{{ old('name') }}" autofocus/>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <input class="form-control" type="text" name="price" placeholder="Price" value="{{ old('price') }}" autofocus/>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Time of License(in Minutes):</strong>
                                <input class="form-control" type="number" name="term" placeholder="Time of License(in Minutes)" value="{{ old('term') }}" autofocus/>
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
