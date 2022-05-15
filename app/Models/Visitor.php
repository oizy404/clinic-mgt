<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table ="tbl_visitors";

    protected $fillable = [
        'user_id',
        'patient_id',
        'patient_relationship',
        'patient_role',
        'first_name',
        'middle_name',
        'last_name',
        'birthday',
        'sex',
        'address',
        'contact_number',
        'status',
        'religion',
        'nationality',
        'archived',
    ];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }

    public function familyDesease(){
        return $this->hasMany(FamilyDesease::class, "visitor_id");
    }
    public function cancer(){
        return $this->hasMany(Cancer::class, "visitor_id");
    }
    public function otherDesease(){
        return $this->hasMany(OtherDesease::class, "visitor_id");
    }

    public function maintenance(){
        return $this->hasMany(Maintenance::class, "visitor_id");
    }
    
    public function immunization(){
        return $this->hasMany(Immunization::class, "visitor_id");
    }

    public function historyIllness(){
        return $this->hasMany(HistoryIllness::class, "visitor_id");
    }
    public function allergy(){
        return $this->hasMany(Allergy::class, "visitor_id");
    }

    public function fracture(){
        return $this->hasMany(Fracture::class, "visitor_id");
    }

    public function operation(){
        return $this->hasMany(Operation::class, "visitor_id");
    }
    
    public function behavior(){
        return $this->hasMany(BehavioralProblem::class, "visitor_id");
    }
    
    public function hospitalization(){
        return $this->hasMany(Hospitalization::class, "visitor_id");
    }
    public function otherIllness(){
        return $this->hasMany(OtherIllness::class, "visitor_id");
    }
    public function remark(){
        return $this->hasMany(Remark::class, "visitor_id");
    }
    public function records(){
        return $this->hasMany(HealthEvaluation::class, "visitor_id");
    }
}
