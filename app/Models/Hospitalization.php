<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    use HasFactory;

    protected $table ="tbl_hospitalizations";
    
    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
