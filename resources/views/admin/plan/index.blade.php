@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="pull-left">
                    <h2>Plan List</h2>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="btn btn-success btn-sm mb-3 btn-round" href="{{ route('plans.create') }}"> Create New Plan</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="report-table" class="table table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Term</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                <td>{{ $plan->name }}</td>
                                <td>{{ $plan->description }}</td>
                                <td>{{ $plan->price }}</td>
                                <td>{{ $plan->term }}</td>
                                <td>
                                    <form action="{{ route('plans.destroy',$plan->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('plans.show',$plan->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('plans.edit',$plan->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
