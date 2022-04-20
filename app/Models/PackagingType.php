<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingType extends Model
{
    use HasFactory;

    protected $table ="tbl_meds_packaging_types";

    protected $fillable = [
        'packaging_types',
    ];

    public function med_supply(){
        return $this->hasMany(MedicalSupply::class, 'packaging_id');
    }
}
