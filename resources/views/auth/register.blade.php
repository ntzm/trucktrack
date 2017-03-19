@extends('layouts.app')

@section('title', 'Register')

@push('scripts')
    <script>
        function onSubmit() {
            document.getElementById('form').submit();
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

@section('content')
<div class="container">
    <h1>Register</h1>
    <form id="form" method="post" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Username</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password-confirm" class="control-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="{{ config('services.recaptcha.site.key') }}" data-callback="onSubmit">Register</button>
        </div>
    </form>
</div>
@endsection
