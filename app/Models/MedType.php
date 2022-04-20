<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedType extends Model
{
    use HasFactory;

    protected $table ="tbl_med_types";

    protected $fillable = ['medicine_type'];

    public function med_supply(){
        return $this->hasMany(MedicalSupply::class, "med_type_id");
    }
}
