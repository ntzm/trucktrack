<?php

namespace App\Http\Requests;

use App\Support\GameType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDelivery extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cargo' => 'required|exists:cargos,id',
            'from' => 'required|exists:locations,id',
            'to' => 'required|exists:locations,id',
            'fuel_used' => 'required|numeric|min:0',
            'distance' => 'required|integer|between:0,100000',
            'earnings' => 'required|integer|min:0',
            'trailer_damage' => 'required|numeric|between:0,100',
            'game_type' => Rule::in(GameType::toArray()),
            'content' => 'max:10000',
        ];
    }
}
