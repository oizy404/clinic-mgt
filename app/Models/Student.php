<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table ="tbl_students";

    protected $fillable = ['first_name', 'middle_name', 'last_name'];

}
