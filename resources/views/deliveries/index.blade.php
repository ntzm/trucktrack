@extends('layouts.app')

@section('title', __('app.deliveries'))

@section('content')
    <div class="container">
        <h1>@lang('app.deliveries')</h1>
        <hr>
        @if ($deliveries->isNotEmpty())
            @include('partials.deliveries', $deliveries)
        @endif
    </div>
@endsection
