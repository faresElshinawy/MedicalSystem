<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
                    'name'=>'required|min:3|max:255|unique:patients,name',
                    'password'=>'required|min:6|max:255',
                    'phone'=>'required|numeric|unique:patients,phone'

                ])
            )
        ];
    }
}
