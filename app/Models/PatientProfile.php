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
    ];

    // public function tbl_parent(){
    //     return $this->hasMany(BirthParent::class);
    // }
    public function tbl_guardian(){
        return $this->hasOne(Guardian::class);
    }
    public function sibling(){
        return $this->hasOne(Sibling::class);
    }
    public function familyDesease(){
        return $this->hasMany(FamilyDesease::class);
    }
    public function maintenance(){
        return $this->hasMany(Maintenance::class);
    }
    public function tbl_immunization(){
        return $this->hasMany(Immunization::class);
    }
    public function historyIllness(){
        return $this->hasMany(HistoryIllness::class);
    }
    // public function tbl_remark(){
    //     return $this->hasOne(Remark::class);
    // }
}
