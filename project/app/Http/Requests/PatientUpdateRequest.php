<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PatientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Patient::class)->ignore(Auth::guard('patient')->user()->id)],
                'snils' => ['required','numeric|max:13'],
                'last_name' => ['required', 'string', 'max:45',],
                'first_name' => ['required', 'string', 'max:45'],
                'father_name' => ['required', 'string', 'max:45'],
                'number_phone' => ['required', 'string', 'max:15', Rule::unique(Patient::class)->ignore(Auth::guard('patient')->user()->id)],
        ];
    }
}
