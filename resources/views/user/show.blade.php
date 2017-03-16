@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>
    @include('partials.users.tabs', ['page' => 'overview'])
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>
                <div class="panel-body">
                    <p>{{ $user->name }} joined {{ $user->created_at->diffForHumans() }} and has completed {{ $deliveryCount }} {{ str_plural('delivery', $deliveryCount) }}</p>

                    @if ($mostProfitableDelivery)
                        <p>Most profitable delivery: <a href="{{ route('deliveries.show', $mostProfitableDelivery) }}">{{ $mostProfitableDelivery->earnings }}</a></p>
                    @endif

                    @if ($furthestDelivery)
                        <p>Furthest delivery: <a href="{{ route('deliveries.show', $furthestDelivery) }}">{{ $furthestDelivery->distance }}</a></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Recent Deliveries
                    <a class="pull-right" href="{{ route('user.deliveries', $user) }}">View All</a>
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
    </div>
</div>
@endsection
