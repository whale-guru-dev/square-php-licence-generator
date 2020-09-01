@extends('layouts.user')

@section('content')
    <div class="container">

        <div class="starter-template">
            <h1>Licence Genertor</h1>
            <p class="lead">Please Check/Choose your plans.</p>
        </div>

        @if(!$licence)
            <div class="row">
                <div class="row row-for-cards">
                    @foreach($plans as $eachPlan)
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <!-- <div class="row"> -->
                                <div class="col-12 text-center card-header">
                                    <span>{{$eachPlan->name}}</span>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <ul>
                                        <li>Price: ${{$eachPlan->price}}</li>
                                    </ul>

                                </div>

                                <div class="col-12 card-footer">
                                    <a class="btn btn-warning btn-block" href="{{route('subscribe-plan', $eachPlan->id)}}">Purchase</a>
                                    <button class="btn btn-warning btn-block" id="purchaseBtn"
                                            data-ptype="{{$eachPlan->id}}">Purchase
                                    </button>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    @endforeach
                </div>

            </div><!-- /.container -->

            <form style="display: none;" id="purchaseForm" action="{{route('subscribe')}}" method="POST">
                @csrf
                <input type="hidden" name="pid" value="" id="pid">
                <input type="hidden" name="type" value="purchase">
            </form>
        @else
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <!-- <div class="row"> -->
                        <div class="col-12 text-center card-header">
                            <span>Your Subscription Details</span>
                        </div>
                        <hr>
                        <div class="col-12">
                            <ul>
                                <li>Name: {{$licence->plan->name}}</li>
                                <li>Price: $ {{$licence->plan->price}}</li>
                                <li>Purchased: {{$licence->created_at}}</li>
                                <li>Expired: {{$licence->expired}}</li>
                                <li>Status: {{$expired ? 'Expired' : 'Live'}}</li>
                            </ul>
                        </div>

                        <div class="col-12 card-footer">
                            <button class="btn btn-primary btn-block" id="repurchaseBtn">Re-purchase</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>

            <form style="display: none;" id="repurchaseForm" action="{{route('subscribe')}}" method="POST">
                @csrf
                <input type="hidden" name="type" value="repurchase"/>
            </form>


        @endif
        @endsection

        @section('js')
            @if(!$licence)
                <script>
                    $(document).on("click", "#purchaseBtn", function () {
                        var ptype = $(this).data('ptype');
                        $("#pid").val(ptype);
                        $("#purchaseForm").submit();
                    });
                </script>
            @else
                <script>
                    $(document).on("click", "#repurchaseBtn", function () {
                        $("#repurchaseForm").submit();
                    });
                </script>
    @endif
@endsection
