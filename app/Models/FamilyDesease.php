<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyDesease extends Model
{
    use HasFactory;

    protected $table ="tbl_family_deseases";

    public function desease(){
        return $this->belongsTo(Desease::class, "desease_id");
    }
    public function patientProfile(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
