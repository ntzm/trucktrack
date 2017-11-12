<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

final class GetDirections extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from' => 'required|exists:locations,id',
            'to' => 'required|exists:locations,id',
        ];
    }
}
