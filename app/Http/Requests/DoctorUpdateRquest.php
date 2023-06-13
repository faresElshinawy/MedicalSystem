<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateRquest extends FormRequest
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
                array_merge(Doctor::rules(),[
                    'name'=>'required|min:3|max:255|unique:doctors,name,'.$this->doctor->id,
                    'email'=>'required|email|unique:doctors,email,'.$this->doctor->id,
                    'password'=>'nullable|min:6|max:255',
                    'image'=>'nullable|max:2048|mimes:jpeg,jpg,png.gif',
                ])
            )
        ];
    }
}
