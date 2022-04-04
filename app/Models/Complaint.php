<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table ="tbl_complaints";

    protected $fillable = [
        "chief_complaints_id",
        "health_evaluation_id",
    ];

    public function chief_complaint(){
        return $this->belongsTo(ChiefComplaint::class, "chief_complaints_id");
    }

    public function health_evaluation(){
        return $this->belongsTo(HealthEvaluation::class, "health_evaluation_id");
    }

    public function otherComplaint(){
        return $this->hasMany(Complaint::class, "complaints_id");
    }
}
