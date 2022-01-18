<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'name'    => 'required|max:60',
            'email'   => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo'    => 'nullable|image|max:2048',
            // 'logo'    => [
            //     'required',
            //     'image',
            //     Rule::dimensions()
            //         ->minHeight(100)
            //         ->minWidth(100),
            // ],
         ];
    }
}
