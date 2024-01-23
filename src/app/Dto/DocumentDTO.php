<?php

namespace App\Dto;

class DocumentDTO
{
    public $file;
    public $mdatas_ids;
    public $mdatas_values;
    public $selectedDepartments;
    public $selected_permissions;
    public $selectedUsers;
    public $selectedUserPermissions;

    public function __construct($data)
    {
        $this->file = $data['file'];
        $this->mdatas_ids = $data['mdata_id'];
        $this->mdatas_values = $data['mdata_value'];
        $this->selectedDepartments = $data['selected_departments'] ?? [];
        $this->selected_permissions = $data['selected_permissions'] ?? [];
        $this->selectedUsers = $data['selected_users'] ?? [];
        $this->selectedUserPermissions = $data['selected_user_permissions'] ?? [];
    }


    public function toArray(): array
    {
        return [
            'file' => $this->file,
            'mdata_id' => $this->mdatas_ids,
            'mdata_value' => $this->mdatas_values,
            'selected_departments' => $this->selectedDepartments,
            'selected_permissions' => $this->selected_permissions,
            'selected_users' => $this->selectedUsers,
            'selected_user_permissions' => $this->selectedUserPermissions,
        ];
    }
}
