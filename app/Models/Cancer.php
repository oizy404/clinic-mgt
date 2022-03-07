<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
{
    use HasFactory;

    protected $table ="tbl_cancers";

    public function patient(){
        return $this->belongsTo(PatientProfile::class, "patient_id");
    }
}
