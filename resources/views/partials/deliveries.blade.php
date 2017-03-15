<table class="table table-striped">
    <thead>
    <tr>
        <th>User</th>
        <th>From</th>
        <th>To</th>
        <th>Cargo</th>
        <th>Distance</th>
        <th>Fuel Used</th>
        <th>Earnings</th>
        <th>Trailer Damage</th>
        <th>Submitted</th>
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
            <td>{{ $delivery->created_at->diffForHumans() }}</td>
            <td><a href="{{ route('deliveries.show', $delivery) }}">View</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $deliveries->links() }}
