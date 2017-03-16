@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>
    @include('partials.users.tabs', ['page' => 'deliveries'])
    @if ($deliveries->isNotEmpty())
        @include('partials.deliveries', $deliveries)
    @endif
</div>
@endsection
