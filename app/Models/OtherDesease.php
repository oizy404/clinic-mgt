<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherDesease extends Model
{
    use HasFactory;

    protected $table ="tbl_other_deseases";

    protected $fillable = ['other_desease','patient_id'];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
