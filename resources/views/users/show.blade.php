@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Recent Deliveries
                    <a class="pull-right" href="{{ route('users.deliveries', $user) }}">View All</a>
                </div>
                <ul class="list-group">
                    @foreach ($recentDeliveries as $delivery)
                        <a class="list-group-item" href="{{ route('deliveries.show', $delivery) }}">
                            Delivered <strong>{{ $delivery->cargo->name }}</strong> from <strong>{{ $delivery->from->name }}</strong> to <strong>{{ $delivery->to->name }}</strong> {{ $delivery->created_at->diffForHumans() }}
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Total Deliveries</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <div class="h1">{{ $totals['all'] }}</div>
                            All time
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="h1">{{ $totals['month'] }}</div>
                            Last 31 days
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="h1">{{ $totals['day'] }}</div>
                            Last 24 hours
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
