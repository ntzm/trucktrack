@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>TruckTrack</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('app.recent_deliveries')
                        <a class="pull-right" href="{{ route('deliveries.index') }}">@lang('app.view_all')</a>
                    </div>
                    @include('partials.deliveries-summary', ['deliveries' => $recentDeliveries])
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('app.total_deliveries')</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <div class="h1">{{ $totals['all'] }}</div>
                                @lang('app.all_time')
                            </div>
                            <div class="col-sm-4 text-center">
                                <div class="h1">{{ $totals['month'] }}</div>
                                @lang('app.last_31_days')
                            </div>
                            <div class="col-sm-4 text-center">
                                <div class="h1">{{ $totals['day'] }}</div>
                                @lang('app.last_24_hours')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
