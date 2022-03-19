<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fracture extends Model
{
    use HasFactory;

    protected $table ="tbl_fractures";

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}