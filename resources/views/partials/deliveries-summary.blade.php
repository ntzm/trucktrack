<ul class="list-group">
    @foreach ($deliveries as $delivery)
        <a class="list-group-item" href="{{ route('deliveries.show', $delivery) }}">
            @lang('app.delivery_summary', [
                'user' => $delivery->user->name,
                'cargo' => $delivery->cargo->name,
                'from' => $delivery->from->name,
                'to' => $delivery->to->name,
            ])
            {{ $delivery->created_at->diffForHumans() }}
        </a>
    @endforeach
</ul>
