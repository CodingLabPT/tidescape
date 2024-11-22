<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'img' => 'required|image',
            'img2' => 'required|image',
            'img3' => 'required|image',
            'name' => 'required|string|max:255',
            'local' => 'required|string',
            'duration' => 'required|string',
            'ep' => 'required|numeric',
            'eg' => 'required|numeric',
            'emg' => 'required|numeric',
            'destaque' => 'required|string',
            'obs' => 'required|string|max:1000',
        ];
    }
}
