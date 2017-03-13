@extends('layouts.app')

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
</div>
@endsection
