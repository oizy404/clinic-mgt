<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $table ="tbl_operations";

    protected $fillable = [
        'operation',
        'patient_id',
        'visitor_id',
    ];
    
    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
    public function visitor(){
        return $this->belongsTo(Visitor::class, "visitor_id");
    }
}
