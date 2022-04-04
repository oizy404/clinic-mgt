<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fracture extends Model
{
    use HasFactory;

    protected $table ="tbl_fractures";

    protected $fillable = [
        'fracture',
        'historyIllness_id'
    ];

    public function historyIllness(){
        return $this->belongsTo(HistoryIllness::class, "historyIllness_id");
    }
}
