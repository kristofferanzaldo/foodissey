<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity'=> 'required',
        ];
    }

    public function messages()
    {
        return
            [
                'name.required' => 'Il nome è obbligatorio',
                'price.required' => 'Il prezzo è obbligatorio',
                'description.required' => 'La descrizione è obbligatoria',
                'quantity.required' => 'La quantità è obbligatoria',
            ];
    }
}
