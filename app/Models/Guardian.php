<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $table ="tbl_guardians";

    protected $fillable = [
        'complete_name',
        'relationship',
        'contact_number',
        'patient_id'
    ];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
    public function location(){
        return $this->hasMany(Location::class, "guardian_id");
    }
}
