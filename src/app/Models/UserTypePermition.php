<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTypePermition extends Model
{
    use HasFactory, SoftDeletes;

    public function userType(){
        return $this->belongsTo(UserType::class);
    }

    protected $fillable = [
        'type'
    ];
}
