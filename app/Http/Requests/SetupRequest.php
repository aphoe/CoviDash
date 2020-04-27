<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetupRequest extends FormRequest
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
            'database_name' => 'required',
            'database_user' => 'required',
            'database_password' => 'nullable',
            'database_port' => 'required|numeric',
            'database_host' => 'required',

            'instance_name' => 'required|max:60',
            'instance_short_name' => 'required|max:12',
            'instance_slogan' => 'nullable|max:120',
            'url' => 'required|url',
            'country' => 'required|max:2',
            'google_tracking_id' => 'required|string|min:13|alpha_dash|starts_with:UA-',

            'name' => 'required|max:80',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',

            'agree' => 'required',
        ];
    }
}
