<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
          'code' => 'required',
          'name' => 'required|min:2|max:100',
          'description' => 'required|min:4|max:150',
          'import_price' => 'min:1|max:10',
          'cash_price' => 'min:1|max:10',
          'credit_price' => 'min:1|max:10',
          'category_id' => 'required|exists:in_categories,id',
          'product_type_id' => 'required|exists:in_product_type,id',
          'units_id' => 'required|exists:in_units,id',
          'available_stock' => 'required|min:1|max:10',
          'critical_stock' => 'required|min:1|max:10',
        ];
    }

}
