<?php


namespace App\Services;

use App\Models\User;
use App\Models\UserType;
use App\DTO\UserDTO;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(UserDTO $userDTO): User
    {
        $user = new User;
        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->password = Hash::make($userDTO->password);
        $user->department_id = $userDTO->department_id;
        $user->save();

        $this->createUserType($user->id, $userDTO->user_type_permition_id);

        return $user;
    }

    public function updateUser(User $user, UserDTO $userDTO): void
    {
        $user->update($userDTO->toArray());

        $userType = UserType::where('user_id', $user->id)->first();
        if ($userType) {
            $userType->user_type_permition_id = $userDTO->user_type_permition_id;
            $userType->save();
        }
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }

    protected function createUserType(int $userId, int $userTypePermissionId): void
    {
        $userType = new UserType;
        $userType->user_id = $userId;
        $userType->user_type_permition_id = $userTypePermissionId;
        $userType->save();
    }
}