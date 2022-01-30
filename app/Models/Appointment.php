<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // protected $table ="tbl_appointments";
    protected $table ="tbl_consultation_schedules";

    protected $fillable = ['title','start','end'];

    // public function patient(){
    //     return $this->belongsTo(Student::class, "patient_id");
    // }
}
