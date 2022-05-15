<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $table ="tbl_maintenance";

    protected $fillable = [
        'medication_name',
        'dosage',
        'frequency',
        'patient_id',
        'visitor_id',
    ];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
    public function visitor(){
        return $this->belongsTo(Visitor::class, "visitor_id");
    }
}
