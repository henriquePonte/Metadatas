<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mdata extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['mdata'];


    public function documentMdata(){
        return $this->hasMany(DocumentMdata::class);
    }



}
