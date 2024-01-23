<?php

namespace App\Services;

use App\Models\Department;

class DepartmentService
{
    public function getAllDepartments()
    {
        return Department::orderBy('name')->paginate(25);
    }

    public function createDepartment($data)
    {
        $department = new Department;
        $department->name = $data['name'];
        $department->code = $data['code'];
        $department->save();

        return $department;
    }

    public function getDepartmentById($id)
    {
        return Department::find($id);
    }

    public function updateDepartment($id, $data)
    {
        $department = Department::find($id);

        if ($department) {
            $department->name = $data['name'];
            $department->code = $data['code'];
            $department->update();
        }

        return $department;
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);

        if ($department) {
            $department->delete();
        }

        return $department;
    }
}

