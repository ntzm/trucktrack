@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">@yield('title')</h1>
                </div>
                <div class="panel-body">
                    @yield('form')
                </div>
            </div>
        </div>
    </div>
@endsection
