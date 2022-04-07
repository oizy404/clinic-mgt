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
    
}
