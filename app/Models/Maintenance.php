<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $table ="tbl_maintenances";

    protected $fillable = [
        'medication_name',
        'dosage',
        'frequency',
    ];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
