<?php

namespace App\Http\Requests\BackOffice\RolePermissions;

use Illuminate\Foundation\Http\FormRequest;

class syncRolePermissions extends FormRequest
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
            "role_id"=>"required|exists:roles,id|numeric",
        ];
    }
}
