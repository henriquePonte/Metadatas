<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Redirect;
use App\Services\DocumentPermitionService;
use App\Services\DepartmentService;


class DepartmentController extends Controller
{
    protected $departmentService;

    // Inject DepartmentService
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        // Get departments from service
        $departments = $this->departmentService->getAllDepartments();
        // Return departments view with data
        return view('departments.index', ['departments' => $departments]);
    }


    public function create() // Display department creation form
    {
        return view('departments.create');
    }

    public function store(Request $request) // Store new department
    {
        $data = $request->only(['name', 'code']);
        $this->departmentService->createDepartment($data);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function show($id)  // show new department by id
    {
        $department = $this->departmentService->getDepartmentById($id);

        return view('departments.show', ['department' => $department]);
    }

    public function edit($id) // edit new department by id
    {
        $department = $this->departmentService->getDepartmentById($id);

        return view('departments.edit', ['department' => $department]);
    }

    public function update(Request $request, $id) // update new department by id
    {
        $data = $request->only(['name', 'code']);
        $this->departmentService->updateDepartment($id, $data);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy($id) // delete new department by id
    {
        $this->departmentService->deleteDepartment($id);

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
