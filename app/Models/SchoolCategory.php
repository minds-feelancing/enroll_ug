<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolCategory extends Model
{
    use HasFactory, SoftDeletes ;

    protected $casts = ['created_at' => 'datetime'];

    public  function schools(){
        return $this->hasMany(School::class,'category_id','id');
    }

}
