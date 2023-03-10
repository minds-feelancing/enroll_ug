<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolFormSection extends Model
{
    use HasFactory ,SoftDeletes;


    public function school(){
        return $this->belongsTo(School::class,'school_id','id');
    }
}
