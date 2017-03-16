@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Delivery</h1>
    <form action="{{ route('deliveries.update', $delivery) }}" method="post">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}
        <input type="hidden" id="old-from" value="{{ old('from', $delivery->from->id) }}">
        <input type="hidden" id="old-to" value="{{ old('to', $delivery->to->id) }}">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="game">Game</label>
                    <select id="game" class="form-control single-selector-search" disabled>
                        <option></option>
                        @foreach ($games as $game)
                            <option value="{{ $game->id }}"{{ old('game', $delivery->from->map->game->id) === $game->id ? ' selected' : '' }}>{{ $game->name }}</option>
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
                            <option value="{{ $cargo->id }}"{{ old('cargo', $delivery->cargo->id) === $cargo->id ? ' selected' : '' }}>{{ $cargo->name }}</option>
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
                        <input id="distance" type="number" class="form-control" name="distance" value="{{ old('distance', $delivery->distance->amount()) }}" min="0" required>
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
                        <input id="fuel_used" type="number" class="form-control" name="fuel_used" value="{{ old('fuel_used', $delivery->fuel_used->amount()) }}" min="0" max="100000" step="any" required>
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
                        <input id="earnings" type="number" class="form-control" name="earnings" value="{{ old('earnings', $delivery->earnings->amount()) }}" min="0" required>
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
                        <input id="trailer_damage" type="number" class="form-control" name="trailer_damage" value="{{ old('trailer_damage', $delivery->trailer_damage->amount()) }}" min="0" max="100" step="any" required>
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
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    <hr>
    <div class="panel panel-danger">
        <div class="panel-heading">Danger Zone</div>
        <div class="panel-body">
            <p>Permanently delete this delivery</p>
            <form method="post" action="{{ route('deliveries.destroy', $delivery) }}">
                <input type="hidden" name="_method" value="delete">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
