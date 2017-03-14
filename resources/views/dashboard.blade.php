@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Deliveries</div>
                <ul class="list-group">
                    @foreach ($recentDeliveries as $delivery)
                        <a class="list-group-item" href="{{ route('deliveries.show', $delivery) }}">
                            <strong>{{ $delivery->user->name }}</strong> delivered <strong>{{ $delivery->cargo->name }}</strong> from <strong>{{ $delivery->from->name }}</strong> to <strong>{{ $delivery->to->name }}</strong> {{ $delivery->created_at->diffForHumans() }}
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
