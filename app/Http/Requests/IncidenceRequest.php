<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'province_id' => 'nullable|numeric|exists:provinces,id',
            'day' => 'required|date',
            'tested' => 'nullable|numeric',
            'positive' => 'nullable|numeric',
            'recovered' => 'nullable|numeric',
            'transfered' => 'nullable|numeric',
            'critical' => 'nullable|numeric',
            'died' => 'nullable|numeric',
        ];
    }
}
