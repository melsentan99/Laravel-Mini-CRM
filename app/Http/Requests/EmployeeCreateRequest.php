<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeCreateRequest extends FormRequest
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
            'first_name' => 'required|max:30',
            'last_name'  => 'required|max:30',
            'company_id' => 'required|numeric|exists:companies,id',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|max:255',
        ];
    }
}
