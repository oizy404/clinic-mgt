<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table ="tbl_students";

    protected $fillable = ['first_name', 'middle_name', 'last_name'];

    public function tbl_parent(){
        return $this->hasMany(BirthParent::class);
    }
    public function tbl_guardian(){
        return $this->hasOne(Guardian::class);
    }
    public function tbl_sibling(){
        return $this->hasOne(Sibling::class, 'patient_id');
    }
    public function tbl_desease(){
        return $this->hasMany(Desease::class);
    }
    public function tbl_immunization(){
        return $this->hasMany(Immunization::class);
    }
    public function tbl_historyillness(){
        return $this->hasMany(HistoryIllness::class);
    }
    public function tbl_remark(){
        return $this->hasOne(Remark::class);
    }
}
