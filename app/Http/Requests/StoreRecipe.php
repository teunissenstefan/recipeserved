<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipe extends FormRequest
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
            'title' => 'required|string|min:5|max:255',
            'time' => 'required|string|min:5|max:255',
            'requirements' => 'required|string|min:100|max:65535',
            'instructions' => 'required|string|min:100|max:65535',
            'credit' => 'nullable|string|min:5|max:255',
        ];
    }
}
