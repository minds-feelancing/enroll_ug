<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSearch extends Model
{
    use HasFactory;
    protected $fillable = ['key_word','category','school_type','ip_address','user'];

}
