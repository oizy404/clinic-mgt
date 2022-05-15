<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthEvaluation extends Model
{
    use HasFactory;

    protected $table ="tbl_health_evaluations";

    protected $fillable = [
        'patient_id',
        'visitor_id',
        'weight',
        'height',
        'BMI',
        'BP',
        'doctors_note',
    ];

    public function position(){
        return $this->hasMany(Position::class, "health_evaluation_id");
    }
    public function complaint(){
        return $this->hasMany(Complaint::class, "health_evaluation_id");
    }
    public function otherComplaint(){
        return $this->hasMany(OtherComplaint::class, "health_evaluation_id");
    }
    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
    
    public function visitor(){
        return $this->belongsTo(Visitor::class, "visitor_id");
    }
}
