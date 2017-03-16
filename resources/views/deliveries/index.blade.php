@extends('layouts.app')

@section('title', 'Deliveries')

@section('content')
<div class="container">
    <h1>Deliveries</h1>
    <hr>
    @if ($deliveries->isNotEmpty())
        @include('partials.deliveries', $deliveries)
    @endif
</div>
@endsection
