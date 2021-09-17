<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table ="tbl_patient_profiles";

    protected $fillable = [
        'school_id','first_name', 'middle_name', 'last_name', 'birthday', 'sex', 'address', 'contact_number', 'status', 'religion', 'nationality'
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
    // public function tbl_desease(){
    //     return $this->hasMany(Desease::class);
    // }
    // public function tbl_immunization(){
    //     return $this->hasMany(Immunization::class);
    // }
    // public function tbl_historyillness(){
    //     return $this->hasMany(HistoryIllness::class);
    // }
    // public function tbl_remark(){
    //     return $this->hasOne(Remark::class);
    // }
}
