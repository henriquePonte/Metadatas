<?php

namespace App\Http\Requests;

use App\Dto\UserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:250', 'min:6'],
            'email' => ['nullable', 'email'],
            'password' => ['nullable', 'min:8', 'max:16'],
            'department_id' => ['nullable', 'min:1', 'max:2'],
            'user_type_permition_id' => ['nullable', 'min:1', 'max:2']
        ];
    }

    public function toDTO(User $user): UserDTO
    {
        return new UserDTO($this->name, $user->email, $user->password, $this->department_id, $this->user_type_permition_id);
    }

}

