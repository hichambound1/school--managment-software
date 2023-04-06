<?php

namespace App\Http\Requests\BackOffice\AdminUsers;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminUserRequest extends FormRequest
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
            'id'=>'required|exists:users,id|numeric',
            'email'=>['required','email','string','max:150',Rule::unique('users')->ignore($this->email, 'email')],
            'password'=>'required|string|max:255|confirmed',
            'cin'=>['required','string','max:150',Rule::unique('profiles')->ignore($this->cin, 'cin')],
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
