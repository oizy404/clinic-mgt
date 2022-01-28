<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sibling extends Model
{
    use HasFactory;

    protected $table ="tbl_siblings";

    protected $fillable = [
        'complete_name','age','sex'
    ];

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}