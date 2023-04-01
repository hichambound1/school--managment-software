<?php

namespace App\Http\Requests\BackOffice\Option;

use Illuminate\Foundation\Http\FormRequest;

class StoreManyOptionRequest extends FormRequest
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
            'options.*.name_en'=>'required|string|max:255',
            'options.*.name_ar'=>'required|string|max:255',
            'options.*.name_fr'=>'required|string|max:255',
            'options.*.description_en'=>'required|string|max:300',
            'options.*.description_ar'=>'required|string|max:300',
            'options.*.description_fr'=>'required|string|max:300',
            'options.*.key'=>'required|string|max:200',
            'options.*.value'=>'required|numeric',
            'options.*.plan_id'=>'required|exists:plans,id|numeric',
        ];
    }
}
