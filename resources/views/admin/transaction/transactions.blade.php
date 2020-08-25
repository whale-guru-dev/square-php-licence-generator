@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Transactions</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Type</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>TRX ID</th>
                            <th>Status</th>
                            <th>Details</th>
                            <th>Date</th>
                        </tr>
                        @foreach($trans as $log)
                            <tr>
                                <td style="text-transform: capitalize;">
                                    {{$log->ipn_type}}
                                </td>
                                <td>
                                    <a href="{{route('user.single', $log->uid)}}">{{\App\User::find($log->uid)->username}}</a>
                                </td>
                                <td>{{$log->amount}} {{$log->currency}}</td>
                                <td>{{$log->txn_id}}</td>
                                <td style="text-transform: capitalize;">{{$log->final_status}}</td>
                                <td style="text-transform: capitalize;">{{$log->status_text}}</td>
                                <td>{{$log->created_at}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <?php echo $trans->render(); ?>
                </div>

            </div><!-- row -->
        </div>
    </div>

@endsection