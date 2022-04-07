<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherComplaint extends Model
{
    use HasFactory;

    protected $table ="tbl_other_chief_complaints";

    protected $fillable = [
        'other_chief_complaint',
        'health_evaluation_id'
    ];

    public function health_evaluation(){
        return $this->belongsTo(HealthEvaluation::class, "health_evaluation_id");
    }
}
