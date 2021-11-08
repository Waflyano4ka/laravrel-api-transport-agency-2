<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.user.edit', $this->user);
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
            'birthday' => ['sometimes', 'date'],
            'deleted' => ['nullable', 'boolean'],
            'dismissed' => ['nullable', 'boolean'],
            'email' => ['sometimes', 'email', Rule::unique('users', 'email')->ignore($this->user->getKey(), $this->user->getKeyName()), 'string'],
            'first_name' => ['sometimes', 'string'],
            'inn' => ['sometimes', Rule::unique('users', 'inn')->ignore($this->user->getKey(), $this->user->getKeyName()), 'string'],
            'passport_number' => ['sometimes', 'string'],
            'passport_series' => ['sometimes', 'string'],
            'password' => ['sometimes', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'scan' => ['nullable', 'string'],
            'second_name' => ['nullable', 'string'],
            'surname' => ['sometimes', 'string'],
            
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
