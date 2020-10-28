@extends('layouts.user')

@section('content')
    @php
        $colors = ['warning', 'success', 'info'];
    @endphp

    <div class="container">

        <div class="starter-template">
            <h1>Tablescrapes</h1>
            <p class="lead">Your Current Plan.</p>
        </div>

        @if(!$licence)
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($plans as $eachPlan)
                            <div class="col-md-4 col-sm-12">
                                <div class="card">
                                    <!-- <div class="row"> -->
                                    <div class="text-center card-header">
                                        <span>{{$eachPlan->name}}</span>
                                    </div>
                                    <hr>
                                    <div class="">
                                        <ul>
                                            <li>Price: ${{$eachPlan->price}}</li>
                                        </ul>

                                    </div>

                                    <div class="card-footer">
                                        <a class="btn btn-{{$colors[$loop->index]}} btn-block"
                                           href="{{route('subscribe-plan', $eachPlan->id)}}">Purchase</a>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- /.container -->
        @else
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <!-- <div class="row"> -->
                        <div class="text-center card-header">
                            <span>Your Subscription Details</span>
                        </div>
                        <hr>
                        <div class="">
                            <ul>
                                <li>Name: {{$licence->plan->name}}</li>
                                <li>Price: $ {{$licence->plan->price}}</li>
                                <li>Purchased: {{$licence->created_at}}</li>
                                <li>Expired: {{$licence->expired}}</li>
                                <li>Status: {{$expired ? 'Expired' : 'Live'}}</li>
                            </ul>
                        </div>

                        <div class="card-footer">
                            <a class="btn btn-primary btn-block" href="{{route('user.plan')}}">Re-purchase</a>
{{--                            <button class="btn btn-primary btn-block" id="repurchaseBtn">Re-purchase</button>--}}
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
            @if($licence)
                <script>
                    $(document).on("click", "#repurchaseBtn", function () {
                        $("#repurchaseForm").submit();
                    });
                </script>
    @endif
@endsection
