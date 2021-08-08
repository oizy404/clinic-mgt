<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table ="tbl_students";

    protected $fillable = ['first_name', 'middle_name', 'last_name'];

    // public static function getStudent(){
    //     $records = DB::table('tbl_students')->select('id', 'first_name', 'middle_name', 'last_name');
    //     return $records;
    // }
}
