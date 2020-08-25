@extends('admin.layout.master')

@section('content')

    @php

    @endphp
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Dashboard</span>
            </li>
        </ul>

    </div>

    <h3 class="page-title"> Dashboard
        <small>dashboard & statistics</small>
    </h3>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i> USERS STATISTICS
                    </div>
                </div>
                <div class="portlet-body text-center">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$users}}">{{$users}}</span>
                                    </div>
                                    <div class="desc"> Total User</div>
                                </div>
                                <a class="more" href="{{route('users')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i> PLANS STATISTICS
                    </div>
                </div>
                <div class="portlet-body text-center">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$plans}}">{{$plans}}</span>
                                    </div>
                                    <div class="desc"> Total Plans</div>
                                </div>
                                <a class="more" href="{{route('plans.index')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}

{{--            <div class="portlet box green">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="fa fa-users"></i>Fund Statistics--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body text-center">--}}
{{--                    @foreach($cwsetting as $each)--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">--}}
{{--                                <div class="dashboard-stat green">--}}
{{--                                    <div class="visual">--}}
{{--                                        <i class="fa fa-money"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="details">--}}
{{--                                        <div class="number">--}}
{{--                                            <span data-counter="counterup"--}}
{{--                                                  data-value="{{$deposit[$each->symbol]}} {{$each->symbol}}">{{$deposit[$each->symbol]}} {{$each->symbol}}</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="desc"> Total Deposit Amount</div>--}}
{{--                                    </div>--}}
{{--                                    <a class="more" href="{{route('transaction.deposit')}}"> View more--}}
{{--                                        <i class="m-icon-swapright m-icon-white"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">--}}
{{--                                <div class="dashboard-stat green">--}}
{{--                                    <div class="visual">--}}
{{--                                        <i class="fa fa-money"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="details">--}}
{{--                                        <div class="number">--}}
{{--                                            <span data-counter="counterup"  data-value="{{$withdrawal[$each->symbol]}} {{$each->symbol}}">{{$withdrawal[$each->symbol]}} {{$each->symbol}}</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="desc"> Total Withdraw Amount</div>--}}
{{--                                    </div>--}}
{{--                                    <a class="more" href="{{route('transaction.withdrawal')}}"> View more--}}
{{--                                        <i class="m-icon-swapright m-icon-white"></i>--}}
{{--                                    </a>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
    </div>

@endsection
