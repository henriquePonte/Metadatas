<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentMdata extends Model
{
    use HasFactory;
    protected $fillable = ['mdata_id', 'document_id', 'content'];

    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function mdata(){
        return $this->belongsTo(Mdata::class);
    }





}
