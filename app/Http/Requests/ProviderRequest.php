<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
          'rut' => 'required',
          'names' => 'required|min:2|max:100',
          'surnames' => 'required|min:2|max:100',
          'address' => 'required|min:10|max:100',
          'email' => 'required|min:4|max:150|email',
          'phone' => 'required|min:4|max:12',
        ];
    }
}
