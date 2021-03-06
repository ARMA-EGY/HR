<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'name' => 'required|unique:departments,name,'.$this->department->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A Department Name is required.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Department Name',
        ];
    }


}
