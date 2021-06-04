@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="col-md-6">
                        <div class="caption">
                            <i class="icon-list font-blue"></i>
                            <span class="caption-subject font-green bold uppercase">User information</span>
                            <h5>Username: <b>{{ $user->name }}</b></h5>
                            <p>Email: <b>{{$user->email}}</b></p>
                            <p>Plan: <b>{{$user->licence && $user->licence->plan && $user->licence->plan->name}}</b></p>
                            <p>Expired: <b>{{$user->licence && $user->licence->expired}}</b></p>
                            @php
                            $paid = \App\Model\Transactions::where('user_id', $user->id)->sum('amount');
                            @endphp
                            <p>Paid: <b>{{$paid}} $</b></p>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-user"></i>Update Profile
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form id="form" method="POST" action="{{route('user.status', $user->id)}}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{method_field('put')}}
                                    <div class="form-group col-md-4">
                                        <label>Users Name</label>
                                        <input type="text" name="name" class="form-control input-sz"
                                               value="{{$user->name}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control input-sz"
                                               value="{{$user->email}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Cookies</label>
                                        <input type="text" name="cookies" class="form-control input-sz"
                                               value="{{$user->cookies}}">
                                    </div>
                                    <hr/>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

