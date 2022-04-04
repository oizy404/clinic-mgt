<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherIllness extends Model
{
    use HasFactory;

    protected $table ="tbl_other_illnesses";

    protected $fillable = [
        'other_illness',
        'historyIllness_id'
    ];

    public function historyIllness(){
        return $this->belongsTo(HistoryIllness::class, "historyIllness_id");
    }
}
