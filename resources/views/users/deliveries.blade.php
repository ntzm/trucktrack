@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}'s Deliveries</h1>
    @if (Auth::check() && Auth::user()->is($user))
        <a class="btn btn-primary" href="{{ route('deliveries.create') }}">Submit a new delivery</a>
    @endif
    @if ($deliveries->isNotEmpty())
        <hr>
        @include('partials.deliveries', $deliveries)
    @endif
</div>
@endsection
