<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PatientUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            $this->validate(
                array_merge(Patient::rules(),[
                    'name'=>'required|min:3|max:255|unique:patients,name,'. (Auth::guard('patient')->check() ? Auth::guard('patient')->user()->id : $this->patient->id),
                    'password'=>'min:6|max:255',
                    'phone'=>'required|numeric|unique:patients,phone,'. (Auth::guard('patient')->check() ? Auth::guard('patient')->user()->id : $this->patient->id),

                ]))
        ];
    }
}
