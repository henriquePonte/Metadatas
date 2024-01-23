<?php

namespace App\Http\Requests;

use App\Dto\DocumentDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => ['required', 'file'],
            'mdata_id' => ['nullable', 'array'],
            'mdata_value' => ['nullable', 'array'],
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
