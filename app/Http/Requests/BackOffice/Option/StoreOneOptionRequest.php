<?php

namespace App\Http\Requests\BackOffice\Option;

use Illuminate\Foundation\Http\FormRequest;

class StoreOneOptionRequest extends FormRequest
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
            'name_en'=>'required|string|max:255',
            'name_ar'=>'required|string|max:255',
            'name_fr'=>'required|string|max:255',
            'description_en'=>'required|string|max:300',
            'description_ar'=>'required|string|max:300',
            'description_fr'=>'required|string|max:300',
            'key'=>'required|string|max:200',
            'value'=>'required|numeric',
            'plan_id'=>'required|exists:plans,id|numeric',
            'id'=>'nullable|exists:options,id|numeric',
        ];
    }
}
