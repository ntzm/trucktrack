@extends('layouts.app')

@push('scripts')
    <script>
        var locations = {
            from: '{{ $delivery->from->name }}',
            to: '{{ $delivery->to->name }}',
        };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initDeliveriesShowMap" async defer></script>
@endpush

@section('content')
<div class="container">
    <p>User: {{ $delivery->user->name }}</p>
    <p>From: {{ $delivery->from->name }}</p>
    <p>To: {{ $delivery->to->name }}</p>
    <p>Distance: {{ $delivery->distance }} km</p>
    <p>Fuel Used: {{ $delivery->fuel_used }} l</p>
    <p>Earnings: €{{ $delivery->earnings }}</p>
    <p>Trailer Damage: {{ $delivery->trailer_damage }}%</p>
    <p>Submitted: {{ $delivery->created_at->diffForHumans() }}</p>
    <div class="map"></div>
</div>
@endsection
