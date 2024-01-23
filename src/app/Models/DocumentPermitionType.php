<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentPermitionType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'document_permition_id', 'department_id', 'document_id', 'user_id'
    ];
    public function documentPermition(){
        return $this->belongsTo(DocumentPermition::class);
    }

    public function document(){
        return $this->belongsToMany(Document::class);
    }

}
