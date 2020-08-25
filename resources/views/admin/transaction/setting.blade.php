@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="col-md-6">
                        <div class="caption">
                            <i class="icon-list font-blue"></i>
                            <span class="caption-subject font-green bold uppercase">Transaction Settings</span>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">

                    <div class="row">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-user"></i>Coin Activation
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form id="form" method="POST" action="{{route('transaction.coin.activate')}}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @foreach($cwSetting as $eachcwSetting)
                                    <div class="form-group col-md-4 ">
                                        <label>{{$eachcwSetting->name}}</label>
                                        <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                               data-offstyle="danger" data-width="100%" data-on="Active"
                                               data-off="Deactive" type="checkbox"
                                               name="status[{{$eachcwSetting->symbol}}]" {{ $eachcwSetting->status == "1" ? 'checked' : '' }}>
                                    </div>
                                    @endforeach
                                    <hr/>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-user"></i>Coin Withdrawal Limit Setting
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form id="coinWithdrawalLimitSettingForm" method="POST" action="{{route('transaction.coin.withdrawalLimit')}}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @foreach($cwlimitSetting as $eachcwlimitSetting)
                                        <h3>{{$eachcwlimitSetting->coin}}</h3>
                                        <div class="row">
                                            <div class="form-group col-md-4 ">
                                                <label>Min Amount</label>
                                                <input type="text" name="min[{{$eachcwlimitSetting->coin}}]" class="form-control input-sz"
                                                       value="{{$eachcwlimitSetting->min}}">
                                            </div>
                                            <div class="form-group col-md-4 ">
                                                <label>Max Amount</label>
                                                <input type="text" name="max[{{$eachcwlimitSetting->coin}}]" class="form-control input-sz"
                                                       value="{{$eachcwlimitSetting->max}}">
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr/>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">Update</button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-user"></i>Coin Withdrawal Confirmation Methods
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form id="coinWithdrawalConfirmMethodForm" method="POST" action="{{route('transaction.coin.confirmMethod')}}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        <div class="row">
                                            <div class="form-group col-md-6 ">
                                                <label>Admin Approval</label>
                                                <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                                       data-offstyle="danger" data-width="100%" data-on="Active"
                                                       data-off="Deactive" type="checkbox"
                                                       name="autoWithdrawal" {{ $withdrawConfirmMethod->autoWithdrawal == "1" ? 'checked' : '' }}>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label>Email Confirmation</label>
                                                <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                                       data-offstyle="danger" data-width="100%" data-on="Active"
                                                       data-off="Deactive" type="checkbox"
                                                       name="emailConfirmWithrawal" {{ $withdrawConfirmMethod->emailConfirmWithrawal == "1" ? 'checked' : '' }}>
                                            </div>
                                        </div>

                                    <hr/>
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Update</button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

