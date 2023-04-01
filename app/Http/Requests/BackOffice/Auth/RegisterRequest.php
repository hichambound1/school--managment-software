<?php

namespace App\Http\Requests\BackOffice\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|unique:users,email|string|max:150',
            'password'=>'required|string|max:255|confirmed',
            'cin'=>'required|string|max:60|unique:profiles,cin',
            'birthday'=>'date|required',

            'first_name_ar'=>'required|string|max:255',
            'last_name_ar'=>'required|string|max:255',
            'address_ar'=>'required|string|max:255',

            'first_name_fr'=>'required|string|max:255',
            'last_name_fr'=>'required|string|max:255',
            'address_fr'=>'required|string|max:255',

            'first_name_en'=>'required|string|max:255',
            'last_name_en'=>'required|string|max:255',
            'address_en'=>'required|string|max:255',
        ];
    }
}
