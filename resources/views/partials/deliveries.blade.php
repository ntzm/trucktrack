<table class="table table-striped">
    <thead>
        <tr>
            <th>@lang('delivery.user')</th>
            <th>@lang('delivery.from')</th>
            <th>@lang('delivery.to')</th>
            <th>@lang('delivery.cargo')</th>
            <th>@lang('delivery.distance')</th>
            <th>@lang('delivery.fuel_used')</th>
            <th>@lang('delivery.earnings')</th>
            <th>@lang('delivery.trailer_damage')</th>
            <th>@lang('delivery.game_type')</th>
            <th>@lang('delivery.submitted')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deliveries as $delivery)
            <tr>
                <td><a href="{{ route('user.overview', $delivery->user) }}">{{ $delivery->user->name }}</a></td>
                <td>{{ $delivery->from->name }}</td>
                <td>{{ $delivery->to->name }}</td>
                <td>{{ $delivery->cargo->name }}</td>
                <td>{{ $delivery->distance }}</td>
                <td>{{ $delivery->fuel_used }}</td>
                <td>{{ $delivery->earnings }}</td>
                <td>{{ $delivery->trailer_damage }}</td>
                <td>{{ $delivery->game_type }}</td>
                <td>{{ $delivery->created_at->diffForHumans() }}</td>
                <td><a href="{{ route('deliveries.show', $delivery) }}">View</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $deliveries->links() }}
