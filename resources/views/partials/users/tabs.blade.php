<ul class="nav nav-tabs" style="margin-bottom: 15px;">
    <li{!! $page === 'overview' ? ' class="active"' : '' !!}><a href="{{ route('user.overview', $user) }}">Overview</a></li>
    <li{!! $page === 'deliveries' ? ' class="active"' : '' !!}><a href="{{ route('user.deliveries', $user) }}">Deliveries</a></li>
</ul>
