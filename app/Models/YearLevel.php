<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearLevel extends Model
{
    use HasFactory;

    protected $table ="tbl_gradelevels";

    protected $fillable = [
        "grade_level",
        "department_id",
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function position(){
        return $this->hasMany(Position::class, "department_id");
    }
}
