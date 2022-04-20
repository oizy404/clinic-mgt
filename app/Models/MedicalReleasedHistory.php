<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalReleasedHistory extends Model
{
    use HasFactory;

    protected $table ="tbl_meds_released_histories";

    protected $fillable = [
        'med_supply_id',
        'receiver_name',
        'quantity',
        'released_date',
    ];

    public function med_supply(){
        return $this->belongsTo(MedicalSupply::class, "med_supply_id");
    }
}
