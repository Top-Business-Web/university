<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {



        if (request()->isMethod('post')) {

            $rules = [
                'unit_name_ar' => 'required',
                'unit_name_en' => 'required',
                'unit_name_fr' => 'required',
                'unit_code' => 'required|unique:units,unit_code',

            ];

        }elseif (request()->isMethod('PUT')) {

            $rules = [
                'unit_name_ar' => 'required',
                'unit_name_en' => 'required',
                'unit_name_fr' => 'required',
                'unit_code' => 'required|unique:units,unit_code,' . request()->id,

            ];
        }

        return $rules;
    }
}
