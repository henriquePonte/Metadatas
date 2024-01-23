<?php

namespace App\Http\Requests;

use App\Dto\UserDTO;
use Illuminate\Foundation\Http\FormRequest;
class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:250', 'min:6'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:16'],
            'department_id' => ['required', 'min:1', 'max:2'],
            'user_type_permition_id' => ['required', 'min:1', 'max:2']
        ];
    }

    public function toDTO(): UserDTO
    {
        return new UserDTO($this->name, $this->email, $this->password, $this->department_id, $this->user_type_permition_id);
    }
}
