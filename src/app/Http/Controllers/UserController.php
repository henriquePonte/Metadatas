<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserType;

use App\Http\Controllers\Auth\Controller;
use App\Models\Department;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\DTO\UserDTO;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->authorizeResource(User::class, 'user');
        $this->userService = $userService;
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(25);
        return view(
            'users.index',
            [
                'users' => $users
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $user = new User;
        return view('users.create', compact('user', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $userDTO = $request->toDTO();

        $user = new User;
        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->password = Hash::make($userDTO->password);
        $user->department_id = $userDTO->department_id;
        $user->save();

        $userType = new UserType;
        $userType->user_id = $user->id;
        $userType->user_type_permition_id = $userDTO->user_type_permition_id;
        $userType->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view(
            'users.show',
            [
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $departments, User $user)
    {
        $departments = Department::all();
        return view('users.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $userDTO = $request->toDTO($user);

        // Update the User
        $user->update($userDTO->toArray());

        // Update the UserType
        $userType = UserType::where('user_id', $user->id)->first();
        if ($userType) {
            $userType->user_type_permition_id = $userDTO->user_type_permition_id;
            $userType->save();
        }

        return redirect()->route('users.index')->with('success', 'User and UserType updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    public function departmentName(User $user)
    {
        return $user->join('departments', 'users.department_id', '=', 'departments.id')
            ->where('users.id', $user->id)
            ->value('departments.name');
    }

}
