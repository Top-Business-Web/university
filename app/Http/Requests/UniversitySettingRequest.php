<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversitySettingRequest extends FormRequest
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
        return [
            'email' => 'required|email',
            'logo' => 'nullable',
            'stamp_logo' => 'nullable|mimes:png',
            'title.ar' => 'required',
            'title.en' => 'required',
            'title.fr' => 'required',
            'description.ar' => 'required',
            'description.en' => 'required',
            'description.fr' => 'required',
            'colleges_digital_platform' => 'required',
            'colleges_digital_magazine' => 'required',
            'digital_student_platform' => 'nullable',
            'address.ar' => 'required',
            'address.en' => 'required',
            'address.fr' => 'required',
            'facebook_link' => 'required',
            'whatsapp_link' => 'required',
            'youtube_link' => 'required',
            'reregister_start' => 'required|before_or_equal:reregister_end',
            'reregister_end' => 'required',
            'phone' => 'required',
            'reregister_the_track_start' => 'required|before_or_equal:reregister_the_track_end',
            'reregister_the_track_end' => 'required',
        ];
    }
}
