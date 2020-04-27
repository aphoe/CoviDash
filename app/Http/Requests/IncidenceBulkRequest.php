<?php

namespace App\Http\Requests;

use App\Province;
use Illuminate\Foundation\Http\FormRequest;

class IncidenceBulkRequest extends FormRequest
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
        $rules = [];
        $rules['day'] = 'required|date';

        //Get provinces
        $provinces = Province::where('active', true)
            ->orderBy('name')
            ->get();

        //Province rules
        foreach($provinces as $province){
            $rules[$province->code . '-' . 'tested'] = 'nullable|numeric';
            $rules[$province->code . '-' . 'positive'] = 'nullable|numeric';
            $rules[$province->code . '-' . 'recovered'] = 'nullable|numeric';
            $rules[$province->code . '-' . 'transfered'] = 'nullable|numeric';
            $rules[$province->code . '-' . 'critical'] = 'nullable|numeric';
            $rules[$province->code . '-' . 'died'] = 'nullable|numeric';
        }

        //dd($rules);

        return $rules;
    }

    public function messages()
    {
        return [
            'numeric' => 'Must be a number.',
        ];
    }
}
