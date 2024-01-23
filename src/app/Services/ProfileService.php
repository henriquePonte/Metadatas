<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileService
{
    public function getUserProfile()
    {
        return Auth::user();
    }

    public function updateUserProfile(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return $user;
    }

    public function deleteUserProfile(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            Auth::logout();
            $user->delete();
        }

        return $user;
    }
}
