@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submit Delivery</h1>
    <form action="{{ route('deliveries.store') }}" method="post">
        {{ csrf_field() }}
        @if (old('from'))
            <input type="hidden" id="old-from" value="{{ old('from') }}">
        @endif
        @if (old('to'))
            <input type="hidden" id="old-to" value="{{ old('to') }}">
        @endif
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="game">Game</label>
                    <select id="game" class="form-control single-selector-search" name="game">
                        <option></option>
                        @foreach ($games as $game)
                            <option value="{{ $game->id }}"{{ old('game') === $game->id ? ' selected' : '' }}>{{ $game->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                    <label for="cargo" class="control-label">Cargo</label>
                    <select id="cargo" class="form-control single-selector-search" name="cargo" required>
                        <option></option>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id }}"{{ old('cargo') === $cargo->id ? ' selected' : '' }}>{{ $cargo->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('cargo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cargo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div id="location-container"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('distance') ? ' has-error' : '' }}">
                    <label for="distance" class="control-label">Distance</label>
                    <div class="input-group">
                        <input id="distance" type="number" class="form-control" name="distance" value="{{ old('distance') }}" min="0" required>
                        <div class="input-group-addon">km</div>
                    </div>
                    @if ($errors->has('distance'))
                        <span class="help-block">
                            <strong>{{ $errors->first('distance') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('fuel_used') ? ' has-error' : '' }}">
                    <label for="fuel_used" class="control-label">Fuel Consumed</label>
                    <div class="input-group">
                        <input id="fuel_used" type="number" class="form-control" name="fuel_used" value="{{ old('fuel_used') }}" min="0" max="100000" step="any" required>
                        <div class="input-group-addon">l</div>
                    </div>
                    @if ($errors->has('fuel_used'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fuel_used') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('earnings') ? ' has-error' : '' }}">
                    <label for="earnings" class="control-label">Earnings</label>
                    <div class="input-group">
                        <div class="input-group-addon">€</div>
                        <input id="earnings" type="number" class="form-control" name="earnings" value="{{ old('earnings') }}" min="0" required>
                    </div>
                    @if ($errors->has('earnings'))
                        <span class="help-block">
                            <strong>{{ $errors->first('earnings') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('trailer_damage') ? ' has-error' : '' }}">
                    <label for="trailer_damage" class="control-label">Trailer Damage</label>
                    <div class="input-group">
                        <input id="trailer_damage" type="number" class="form-control" name="trailer_damage" value="{{ old('trailer_damage') }}" min="0" max="100" step="any" required>
                        <div class="input-group-addon">%</div>
                    </div>
                    @if ($errors->has('trailer_damage'))
                        <span class="help-block">
                            <strong>{{ $errors->first('trailer_damage') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
