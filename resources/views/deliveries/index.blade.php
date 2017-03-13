@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Deliveries</h1>
    <a class="btn btn-primary" href="{{ route('deliveries.create') }}">Submit a new delivery</a>
    @if ($deliveries->isNotEmpty())
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Cargo</th>
                    <th>Distance</th>
                    <th>Fuel Used</th>
                    <th>Earnings</th>
                    <th>Trailer Damage</th>
                    <th>Submitted</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveries as $delivery)
                    <tr>
                        <td>{{ $delivery->from->name }}</td>
                        <td>{{ $delivery->to->name }}</td>
                        <td>{{ $delivery->cargo->name }}</td>
                        <td>{{ $delivery->distance }} km</td>
                        <td>{{ $delivery->fuel_used }} l</td>
                        <td>€{{ $delivery->earnings }}</td>
                        <td>{{ $delivery->trailer_damage }}%</td>
                        <td>{{ $delivery->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('deliveries.show', $delivery) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $deliveries->links() }}
    @endif
</div>
@endsection
