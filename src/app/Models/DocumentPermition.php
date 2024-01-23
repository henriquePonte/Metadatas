<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentPermition extends Model
{
    use HasFactory, SoftDeletes;


    public function documentPermitionType(){
        return $this->hasMany(DocumentPermitionType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deparment(){
        return $this->belongsTo(Department::class);
    }

}
