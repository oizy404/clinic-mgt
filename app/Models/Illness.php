<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    use HasFactory;

    protected $table ="tbl_illnesses";

    protected $fillable = ['illness_name'];

    public function historyIllness(){
        return $this->hasMany(HistoryIllness::class);
    }
}
