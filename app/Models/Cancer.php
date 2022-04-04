<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
{
    use HasFactory;

    protected $table ="tbl_cancers";

    protected $fillable = ['cancer','familyDesease_id'];

    public function familyDesease(){
        return $this->belongsTo(FamilyDesease::class, "familyDesease_id");
    }
}
