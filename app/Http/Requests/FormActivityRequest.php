<?php

namespace App\Http\Requests\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class FormActivityRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'a_date' => 'required',
            'a_name' => 'required',
            'a_place' => 'required',
            'a_register_date' => 'required',
        ];
    }
}
