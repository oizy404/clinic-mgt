<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherIllness extends Model
{
    use HasFactory;

    protected $table ="tbl_other_illnesses";

    protected $fillable = [
        'other_illness',
        'patient_id'
    ];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
