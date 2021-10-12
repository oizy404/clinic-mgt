<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desease extends Model
{
    use HasFactory;

    protected $table ="tbl_deseases";

    protected $fillable = ['desease_name'];

    public function familyDesease(){
        return $this->hasMany(FamilyDesease::class);
    }

}
