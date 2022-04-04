<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryIllness extends Model
{
    use HasFactory;

    protected $table ="tbl_history_illnesses";

    protected $fillable = [
        'illness_id',
        'patient_id'
    ];

    public function illness(){
        return $this->belongsTo(Illness::class, "illness_id");
    }

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }

    public function allergy(){
        return $this->hasMany(Allergy::class, "historyIllness_id");
    }

    public function fracture(){
        return $this->hasMany(Fracture::class, "historyIllness_id");
    }

    public function operation(){
        return $this->hasMany(Operation::class, "historyIllness_id");
    }
    
    public function behavior(){
        return $this->hasMany(BehavioralProblem::class, "historyIllness_id");
    }
    
    public function hospitalization(){
        return $this->hasMany(Hospitalization::class, "historyIllness_id");
    }

    public function otherIllness(){
        return $this->hasMany(OtherIllness::class, "historyIllness_id");
    }
}
