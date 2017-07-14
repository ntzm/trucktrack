@extends('layouts.app')

@section('title')
    {{ $delivery->user->name }} delivered {{ $delivery->cargo->name }} from {{ $delivery->from->name }} to {{ $delivery->to->name }}
@endsection

@push('scripts')
    <script>
        var locations = {
            from: '{{ $delivery->from->id }}',
            to: '{{ $delivery->to->id }}',
        };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.gmaps.client.key') }}&libraries=geometry&callback=initDeliveriesShowMap" async defer></script>
@endpush

@section('content')
    <div class="container">
        <p class="lead"><a href="{{ route('user.overview', $delivery->user) }}">{{ $delivery->user->name }}</a> delivered {{ $delivery->cargo->name }} from {{ $delivery->from->name }} to {{ $delivery->to->name }} {{ $delivery->created_at->diffForHumans() }}</p>
        @can('modify', $delivery)
            <a href="{{ route('deliveries.edit', $delivery) }}" class="btn btn-primary">Edit delivery</a>
        @endcan
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Delivery Information</div>
                    <div class="panel-body">
                        <dl class="dl-horizontal" style="margin: 0;">
                            <dt>User</dt>
                            <dd><a href="{{ route('user.overview', $delivery->user) }}">{{ $delivery->user->name }}</a></dd>
                            <dt>Distance</dt>
                            <dd>{{ $delivery->distance }}</dd>
                            <dt>Fuel used</dt>
                            <dd>{{ $delivery->fuel_used }}</dd>
                            <dt>Earnings</dt>
                            <dd>{{ $delivery->earnings }}</dd>
                            <dt>Game type</dt>
                            <dd>{{ ucwords($delivery->game_type) }}</dd>
                            <dt>Submitted</dt>
                            <dd>{{ $delivery->created_at->diffForHumans() }}</dd>
                            @if ($delivery->updated_at != $delivery->created_at)
                                <dt>Updated</dt>
                                <dd>{{ $delivery->updated_at->diffForHumans() }}</dd>
                            @endif
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
                <div class="panel panel-default">
                    <div class="panel-heading">Trailer Damage</div>
                    <div class="panel-body">
                        <div class="h3" style="margin-top: 0;">{{ $delivery->trailer_damage }}</div>
                        <div class="progress" style="margin-bottom: 0;">
                            <div class="progress-bar progress-bar-danger" style="width: {{ $delivery->trailer_damage }};"></div>
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
                        <div class="h3" style="margin-top: 0;">{{ $delivery->from->name }} <small>{{ $delivery->from->country->name }}</small></div>
                        <p>Map: {{ $delivery->from->map->name }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Destination</div>
                    <div class="panel-body">
                        <div class="h3" style="margin-top: 0;">{{ $delivery->to->name }} <small>{{ $delivery->to->country->name }}</small></div>
                        <p>Map: {{ $delivery->to->map->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default map-container">
            <div class="panel-heading">Map</div>
            <div class="panel-body" style="padding: 0;">
                <div class="map"></div>
                <p class="h3 map-loading text-center" style="margin-bottom: 15px;">Loading...</p>
            </div>
        </div>
        @if ($delivery->content)
            <div class="panel panel-default">
                <div class="panel-heading">Additional Comments</div>
                <div class="panel-body">{{ App\Support\format_content($delivery->content) }}</div>
            </div>
        @endif
    </div>
@endsection
