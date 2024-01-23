<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use App\Models\UserTypePermition;
use Illuminate\Http\Request;
use App\Services\UserTypeService;

class UserTypeController extends Controller
{
    protected $userTypeService;

    public function __construct(UserTypeService $userTypeService)
    {
        $this->userTypeService = $userTypeService;
    }

    public function index()
    {
        $userTypes = $this->userTypeService->getAllUserTypes();

        return view('userTypes.index', [
            'userTypes' => $userTypes
        ]);
    }

    public function update(Request $request, UserType $userType)
    {
        $this->userTypeService->updateUserType($request, $userType);

        // You might want to redirect or return a response here.
    }

    public function store(Request $request)
    {
        $this->userTypeService->storeUserType($request);

        return redirect()->route('userTypes.index');
    }

    public function create()
    {
        $usertypespermition = $this->userTypeService->createUserType();

        return view('userTypes.create', compact('usertypespermition'));
    }

    public function destroy(string $id)
    {
        $this->userTypeService->destroyUserType($id);

        return redirect()->route('userTypes.index');
    }
}
