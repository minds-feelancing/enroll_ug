<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

  
    public  function category(){
        return $this->belongsTo(SchoolCategory::class,'category_id','id');
    }


    public function questions(){
        return $this->hasMany(SchoolFormQuestion::class,'school_id','id');
    }


    public function sections(){
        return $this->hasMany(SchoolFormSection::class,'school_id','id');
    }


    
    public function staff(){
        return $this->hasMany(SchoolStaff::class,'school_id','id');
    }
}
