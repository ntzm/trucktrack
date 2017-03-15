@extends('layouts.app')

@push('scripts')
    <script>
        var locations = {
            from: '{{ $delivery->from->name }}',
            to: '{{ $delivery->to->name }}',
        };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=geometry&callback=initDeliveriesShowMap" async defer></script>
@endpush

@section('content')
<div class="container">
    <p class="lead"><a href="{{ route('users.show', $delivery->user) }}">{{ $delivery->user->name }}</a> delivered {{ $delivery->cargo->name }} from {{ $delivery->from->name }} to {{ $delivery->to->name }} {{ $delivery->created_at->diffForHumans() }}</p>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Delivery Information</div>
                <div class="panel-body">
                    <dl class="dl-horizontal" style="margin: 0;">
                        <dt>User</dt>
                        <dd><a href="{{ route('users.show', $delivery->user) }}">{{ $delivery->user->name }}</a></dd>
                        <dt>Distance</dt>
                        <dd>{{ $delivery->distance }}</dd>
                        <dt>Fuel used</dt>
                        <dd>{{ $delivery->fuel_used }}</dd>
                        <dt>Earnings</dt>
                        <dd>{{ $delivery->earnings }}</dd>
                        <dt>Submitted</dt>
                        <dd>{{ $delivery->created_at->diffForHumans() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Cargo</div>
                <div class="panel-body">
                    <div class="h3" style="margin: 0;">{{ $delivery->cargo->name }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Trailer Damage</div>
                <div class="panel-body">
                    <div class="progress" style="margin-bottom: 0;">
                        <div class="progress-bar progress-bar-danger" style="min-width: 2em; width: {{ $delivery->trailer_damage }};">
                            {{ $delivery->trailer_damage }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Origin</div>
                <div class="panel-body">
                    <div class="h3" style="margin: 0;">{{ $delivery->from->name }}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Destination</div>
                <div class="panel-body">
                    <div class="h3" style="margin: 0;">{{ $delivery->to->name }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Map</div>
        <div class="panel-body" style="padding: 0;">
            <div class="map"></div>
            <p class="h3 map-loading text-center" style="margin-bottom: 15px;">Loading...</p>
        </div>
    </div>
</div>
@endsection
