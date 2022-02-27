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

    // public function tbl_parent(){
    //     return $this->hasMany(BirthParent::class);
    // }
    public function tbl_guardian(){
        return $this->hasOne(Guardian::class, 'patient_id');
    }
    public function sibling(){
        return $this->hasOne(Sibling::class, 'patient_id');
    }
    public function familyDesease(){
        return $this->hasMany(FamilyDesease::class, 'patient_id');
    }
    public function maintenance(){
        return $this->hasMany(Maintenance::class, 'patient_id');
    }
    public function tbl_immunization(){
        return $this->hasMany(Immunization::class, 'patient_id');
    }
    public function historyIllness(){
        return $this->hasMany(HistoryIllness::class, 'patient_id');
    }
    public function records(){
        return $this->hasMany(HealthEvaluation::class, "patient_id");
    }
    // public function user(){
    //     return $this->belongsTo(User::class, "school_id");
    // }
    // public function tbl_remark(){
    //     return $this->hasOne(Remark::class);
    // }
}
