@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Deliveries</h1>
    <a class="btn btn-primary" href="{{ route('deliveries.create') }}">Submit a new delivery</a>
    @if ($deliveries->isNotEmpty())
        <hr>
        @include('partials.deliveries', $deliveries)
    @endif
</div>
@endsection
