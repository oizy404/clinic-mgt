<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    use HasFactory;

    protected $table ="tbl_hospitalizations";
    
    protected $fillable = [
        'hospitalization',
        'historyIllness_id'
    ];

    public function historyIllness(){
        return $this->belongsTo(HistoryIllness::class, "historyIllness_id");
    }
}
