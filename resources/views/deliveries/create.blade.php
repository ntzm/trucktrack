@extends('layouts.form')

@section('title', __('app.submit_delivery'))

@section('form')
    <form action="{{ route('deliveries.store') }}" method="post">
        {{ csrf_field() }}
        @if (old('from'))
            <input type="hidden" id="old-from" value="{{ old('from') }}">
        @endif
        @if (old('to'))
            <input type="hidden" id="old-to" value="{{ old('to') }}">
        @endif
        <div class="form-group">
            <label>Game</label>
            <div class="btn-group btn-group-justified" data-toggle="buttons">
                @foreach ($games as $game)
                    @php ($isActive = old('game') === $game->id)
                    <label class="btn btn-default{{ $isActive ? ' active' : '' }}">
                        <input type="radio" name="game" value="{{ $game->id }}" autocomplete="off"{{ $isActive ? ' checked' : '' }}> {{ $game->name }}
                    </label>
                @endforeach
            </div>
        </div>
        <div id="location-container"></div>
        <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
            <label for="cargo" class="control-label">Cargo</label>
            <select id="cargo" class="form-control single-selector-search" name="cargo" required>
                <option></option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}"{{ old('cargo') == $cargo->id ? ' selected' : '' }}>{{ $cargo->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('cargo'))
                <span class="help-block">
                    <strong>{{ $errors->first('cargo') }}</strong>
                </span>
            @endif
        </div>
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
        <div class="form-group{{ $errors->has('game_type') ? ' has-error' : '' }}">
            <label class="control-label">Game Type</label>
            <div class="btn-group btn-group-justified" data-toggle="buttons">
                @foreach (\App\Support\Enum\GameType::toArray() as $gameType)
                    @php ($isActive = old('game_type') === $gameType)
                    <label class="btn btn-default{{ $isActive ? ' active' : '' }}">
                        <input type="radio" name="game_type" value="{{ $gameType }}" autocomplete="off"{{ $isActive ? ' checked' : '' }}> {{ $gameType }}
                    </label>
                @endforeach
            </div>
            @if ($errors->has('game_type'))
                <span class="help-block">
                    <strong>{{ $errors->first('game_type') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="control-label">Additional Comments <small class="text-muted">(Optional)</small></label>
            <textarea class="form-control" name="content" id="content" rows="5">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group mb0">
            <button type="submit" class="btn btn-primary">Submit Delivery</button>
        </div>
    </form>
@endsection
