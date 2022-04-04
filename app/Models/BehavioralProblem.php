<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BehavioralProblem extends Model
{
    use HasFactory;

    protected $table ="tbl_behavioral_problems";

    
    protected $fillable = [
        'behavior',
        'historyIllness_id'
    ];

    public function historyIllness(){
        return $this->belongsTo(HistoryIllness::class, "historyIllness_id");
    }
}
