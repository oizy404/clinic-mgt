<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    
    protected $table ="tbl_departments";

    public function yearlevel(){
        return $this->hasMany(YearLevel::class, "department_id");
    }
    public function position(){
        return $this->hasMany(Position::class, "department_id");
    }
}
