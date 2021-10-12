<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryIllness extends Model
{
    use HasFactory;

    protected $table ="tbl_history_illnesses";

    public function illness(){
        return $this->belongsTo(Illness::class, "illness    _id");
    }

    public function patientProfile(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
