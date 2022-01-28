<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    use HasFactory;

    protected $table ="tbl_immunizations";

    protected $fillable = ['vaccine_name'];

    public function vaccine(){
        return $this->belongsTo(Vaccine::class, 'vaccine_id');
    }

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
