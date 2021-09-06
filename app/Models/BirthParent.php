<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthParent extends Model
{
    use HasFactory;

    protected $table ="tbl_parents";

    public function student(){
        return $this->belongsTo(Student::class, "patient_id");
    }
}
