<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.user.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'api_token' => ['nullable', 'string'],
            'birthday' => ['required', 'date'],
            'deleted' => ['nullable', 'boolean'],
            'dismissed' => ['nullable', 'boolean'],
            'email' => ['required', 'email', Rule::unique('users', 'email'), 'string'],
            'first_name' => ['required', 'string'],
            'inn' => ['required', Rule::unique('users', 'inn'), 'string'],
            'passport_number' => ['required', 'string'],
            'passport_series' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'scan' => ['nullable', 'string'],
            'second_name' => ['nullable', 'string'],
            'surname' => ['required', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
