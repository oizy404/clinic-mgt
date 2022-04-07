<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BehavioralProblem extends Model
{
    use HasFactory;

    protected $table ="tbl_behavioral_problems";

    
    protected $fillable = [
        'behavior',
        'patient_id'
    ];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
