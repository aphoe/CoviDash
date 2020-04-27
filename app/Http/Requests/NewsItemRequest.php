<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsItemRequest extends FormRequest
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
        $urlId = 0;
        if(isset($this->segments()[2])){
            $urlId = $this->segments()[2];
        }
        return [
            'date' => 'required|date',
            'source' => 'nullable|max:50',
            'title' => 'required|max:120',
            'teaser' => 'nullable|max:255',
            'url' => 'required|url|unique:news_items,url,' . $urlId,
        ];
    }
}
