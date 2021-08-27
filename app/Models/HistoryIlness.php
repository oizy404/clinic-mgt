<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryIlness extends Model
{
    use HasFactory;

    protected $table ="tbl_historyillnesses";

    protected $fillable = ['illness_name'];

    public function tbl_student(){
        return $this->belongsTo(Student::class, "patient_id");
    }
}
