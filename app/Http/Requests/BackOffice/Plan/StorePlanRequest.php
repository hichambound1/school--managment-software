<?php

namespace App\Http\Requests\BackOffice\Plan;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'name_en'=>'required|string|max:255',
            'description_en'=>'required|string|max:255',
            'description_ar'=>'required|string|max:255',
            'description_fr'=>'required|string|max:255',
            'price'=>'required|integer',
            'unit'=>'required|in:$,DHS',
            'per'=>'required|string|in:Month,Year',
        ];
    }
}
