<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    
    protected $table ="tbl_positions";

    protected $fillable = [
        "personnel_position",
        "personnel_rank",
        "department_id",
        "health_evaluation_id",
    ];

    public function health_evaluation(){
        return $this->belongsTo(HealthEvaluation::class, "health_evaluation_id");
    }
    public function department(){
        return $this->belongsTo(Department::class, "department_id");
    }
}
