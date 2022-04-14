<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table ="tbl_appointments";

    protected $fillable = [
        'title',
        'patient_id',
        'start',
        'end', 
        'color', 
        'textColor',
        'archived'
    ];


    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
        
    }
    public function message(){
        return $this->hasMany(Message::class, "event_id");
    }
}
