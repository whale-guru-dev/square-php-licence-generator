@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Waiting Withdrawl Request For Approval</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped">
                        <tr>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Address</th>
                            <th>TRX ID</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach($trans as $log)
                            <tr>
                                <td>
                                    <a href="{{route('user.single', $log->uid)}}">{{\App\User::find($log->uid)->username}}</a>
                                </td>
                                <td>{{$log->amount}} {{$log->currency}}</td>
                                <td>{{$log->address}}</td>
                                <td>{{$log->txn_id}}</td>
                                <td style="text-transform: capitalize;">{{$log->final_status}}</td>
                                <td style="text-transform: capitalize;">{{$log->description}}</td>
                                <td>{{$log->created_at}}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-outline btn-circle btn-sm green"
                                       id="confirmBtn" data-id="{{$log->id}}">
                                        <i class="fa fa-eye"></i> Confirm
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <?php echo $trans->render(); ?>
                </div>

            </div><!-- row -->
        </div>
    </div>

    <div class="modal fade" id="confirmModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-cogs'></i> Confirm Withdrawal !</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure, You want to  Confirm This Withdrawal Request ?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelBtn">Cancel</button>
                    <button type="button" class="btn btn-info" data-did="0" id="confirmModalBtn">Confirm</button>
                </div>
            </div>
        </div>

    </div>

    <form method="post" action="{{route('transaction.withdrawal.confirmWithdrawal')}}" id="confirmForm">
        {{csrf_field()}}
        <input type="hidden" name="id" id="withID" value="">
    </form>
@endsection

@section('scripts')
<script>
    var id = '';
    $(document).on("click", "#confirmBtn", function(){
       id = $(this).data('id');
       $("#confirmModal").modal('show');
    });

    $("#confirmModalBtn").on("click", function(){
        $("#withID").val(id);
        $("#confirmForm").submit();
    });

    $("#cancelBtn").on("click", function(){
        id = '';
        $("#withID").val(id);
    });

</script>
@endsection