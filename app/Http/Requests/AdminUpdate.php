<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdate extends FormRequest
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
            $this->validate(array_merge(Admin::rules(),[
                'name'=>'required|min:3|max:255|unique:admins,name,'.$this->admin->id,
                'email'=>'required|email|unique:admins,email,'.$this->admin->id,
                'password'=>'nullable|min:6|max:255',
            ]))
        ];
    }
}
