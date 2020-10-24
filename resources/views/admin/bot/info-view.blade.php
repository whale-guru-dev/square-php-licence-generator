@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="pull-left">
                    <h2>Bot Info List</h2>
                </div>
            </div>
            <div class="portlet-body">

                <div class="table-responsive">
                    <table id="report-table" class="table table-bordered table-striped mb-0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Zillow Username</th>
                            <th>Zillow Password</th>
                            <th>Number of Message</th>
                            <th>Message</th>
                            <th>Exclusive words</th>
                            <th>Created</th>
                            <th>Has Cookie</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($botInfoForUsers as $each)
                            <tr>
                                <td>{{ $each->id }}</td>
                                <td><a href="{{route('user.single', $each->user->id)}}"
                                       class="btn btn-outline btn-circle btn-sm green">
                                        <i class="fa fa-eye"></i> {{ $each->user->name }} </a></td>
                                <td>{{ $each->zillow_username }}</td>
                                <td>{{ $each->zillow_password }}</td>
                                <td>{{ $each->num_msg  }}</td>
                                <td>{{ $each->msg  }}</td>
                                <td>{{ $each->blacklist_words  }}</td>
                                <td>{{ $each->created_at  }}</td>
                                <td>{{ $each->user['cookies'] ? "Yes" : "No"}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
