<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    use HasFactory;

    protected $table ="tbl_immunizations";

    protected $fillable = ['vaccine_name'];

    public function tbl_student(){
        return $this->belongsTo(Student::class, "patient_id");
    }
}
