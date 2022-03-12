<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;

    protected $table ="tblparents";

    protected $fillable = [
        'complete_name',
        'relationship',
        'birthday',
        'contact_number',
        'occupation',
        'employment_address',
        'patient_id'
    ];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
