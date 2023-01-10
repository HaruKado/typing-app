<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrillsRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'problem0' => 'required|string|max:255',
            'problem1' => 'string|max:255',
            'problem2' => 'string|max:255',
            'problem3' => 'string|max:255',
            'problem4' => 'string|max:255',
            'problem5' => 'string|max:255',
            'problem6' => 'string|max:255',
            'problem7' => 'string|max:255',
            'problem8' => 'string|max:255',
            'problem9' => 'string|max:255',
        ];
    }
}
