<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $table ="tbl_operations";

    protected $fillable = [
        'operation',
        'historyIllness_id'
    ];
    
    public function historyIllness(){
        return $this->belongsTo(HistoryIllness::class, "historyIllness_id");
    }
}
