<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
          'email' => 'required|min:4|max:150|email',
          'password' => 'required|min:4|max:64',
          'first_name' => 'required|min:4|max:50',
          'last_name' => 'required|min:4|max:50',
        ];
    }
}
