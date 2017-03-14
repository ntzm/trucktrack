@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Recent Deliveries</h2>
            <ul class="list-group">
                @foreach ($recentDeliveries as $delivery)
                    <a href="{{ route('deliveries.show', $delivery) }}" class="list-group-item">
                        <strong>{{ $delivery->user->name }}</strong> delivered <strong>{{ $delivery->cargo->name }}</strong> from <strong>{{ $delivery->from->name }}</strong> to <strong>{{ $delivery->to->name }}</strong> {{ $delivery->created_at->diffForHumans() }}
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
