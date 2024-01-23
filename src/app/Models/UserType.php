<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{
    use HasFactory;


    public function userTypePermition(){
        return $this->hasMany(UserTypePermition::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
