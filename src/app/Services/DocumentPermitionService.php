<?php

namespace App\Services;

use App\Models\Department;

class DocumentPermitionService
{
    public function createDepartment(array $departmentData)
    {
        $department = new Department;
        $department->name = $departmentData['name'];
        $department->code = $departmentData['code'];
        $department->save();

        return $department;
    }

    public function updateDepartment(string $id, array $departmentData)
    {
        $department = Department::find($id);
        if ($department) {
            $department->name = $departmentData['name'];
            $department->code = $departmentData['code'];
            $department->save();
        }

        return $department;
    }

    public function deleteDepartment(string $id)
    {
        $department = Department::find($id);
        if ($department) {
            $department->delete();
        }
    }
}
