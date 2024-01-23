<?php

namespace App\Http\Requests;
use App\Dto\DocumentDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => ['required', 'file'],
            'mdata_id' => ['required', 'array'],
            'mdata_value' => ['required', 'array'],
            'selected_departments' => ['nullable', 'array'],
            'selected_permissions' => ['nullable', 'array'],
            'selected_users' => ['nullable', 'array'],
            'selected_user_permissions' => ['nullable', 'array'],
        ];
    }

    public function toDTO(): DocumentDTO
    {
        return new DocumentDTO($this->all());
    }
}
