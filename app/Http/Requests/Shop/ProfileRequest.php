<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
        ];
    }
}
