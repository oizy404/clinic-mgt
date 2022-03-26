<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    use HasFactory;

    protected $table ="tbl_patient_profiles";

    protected $fillable = [
        'school_id',
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

    public function parent(){
        return $this->hasMany(ParentModel::class, "patient_id");
    }
    public function guardian(){
        return $this->hasMany(Guardian::class, "patient_id");
    }
    public function sibling(){
        return $this->hasMany(Sibling::class, "patient_id");
    }

    public function familyDesease(){
        return $this->hasMany(FamilyDesease::class, "patient_id");
    }
    public function cancer(){
        return $this->hasMany(Cancer::class, "patient_id");
    }
    public function otherDesease(){
        return $this->hasMany(OtherDesease::class, "patient_id");
    }

    public function maintenance(){
        return $this->hasMany(Maintenance::class, "patient_id");
    }
    public function tbl_immunization(){
        return $this->hasMany(Immunization::class, "patient_id");
    }

    public function historyIllness(){
        return $this->hasMany(HistoryIllness::class, "patient_id");
    }
    public function allergy(){
        return $this->hasMany(Allergy::class, "patient_id");
    }
    public function fracture(){
        return $this->hasMany(Fracture::class, "patient_id");
    }
    public function operation(){
        return $this->hasMany(Operation::class, "patient_id");
    }
    public function hospitalization(){
        return $this->hasMany(Hospitalization::class, "patient_id");
    }
    public function behavior(){
        return $this->hasMany(BehavioralProblem::class, "patient_id");
    }
    public function otherIllness(){
        return $this->hasMany(OtherIllness::class, "patient_id");
    }

    public function records(){
        return $this->hasMany(HealthEvaluation::class, "patient_id");
    }
    public function event(){
        return $this->hasMany(Event::class, "patient_id");
    }
    // public function user(){
    //     return $this->belongsTo(User::class, "school_id");
    // }
    // public function tbl_remark(){
    //     return $this->hasOne(Remark::class);
    // }
}
