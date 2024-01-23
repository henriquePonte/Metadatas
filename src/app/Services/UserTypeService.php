<?php

namespace App\Services;

use App\Models\UserType;
use App\Models\UserTypePermition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeService
{
    public function getAllUserTypes()
    {
        return UserTypePermition::orderBy('type')->paginate(25);
    }

    public function updateUserType(Request $request, UserType $userType)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'user_type_permition_id' => 'required',
        ]);

        $userType->update($validatedData);
    }

    public function storeUserType(Request $request)
    {
        $validatedData = $request->validate([
            'user_type_permition' => 'required',
        ]);

        $user = Auth::user();

        $permission = UserTypePermition::firstOrCreate(['type' => $validatedData['user_type_permition']]);

        $userType = new UserType();
        $userType->user_id = $user->id;
        $userType->user_type_permition_id = $permission->id;
        $userType->save();

        return $userType;
    }

    public function createUserType()
    {
        return new UserTypePermition();
    }

    public function destroyUserType(string $id)
    {
        $userTypePermition = UserTypePermition::find($id);

        if (empty($userTypePermition)) {
            abort(404);
        }

        $userTypePermition->delete();

        return $userTypePermition;
    }
}
