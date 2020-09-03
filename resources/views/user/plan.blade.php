@extends('layouts.user')

@section('content')
    @php
    $colors = ['warning', 'success', 'info'];
    @endphp
    <div class="container">

        <div class="starter-template">
            <h1>Subscribe plans</h1>
            <p class="lead">Please Choose any plan.</p>
        </div>

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

                                @if(Auth::user()->licence->plan_id !== $eachPlan->id)
                                <div class="card-footer">
                                    <a class="btn btn-{{$colors[$loop->index]}} btn-block"
                                       href="{{route('subscribe-plan', $eachPlan->id)}}">
                                        @if(Auth::user()->licence->plan->price > $eachPlan->price)
                                            Downgrade
                                        @else
                                            Upgrade
                                        @endif
                                    </a>
                                </div>
                                @else
                                    <div class="card-footer">
                                        <a class="btn btn-warning btn-block"
                                           href="javascript:void(0);">Current Plan</a>
                                    </div>
                                @endif
                            </div>
                            <!-- </div> -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
