<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $table ="tbl_vaccines";

    protected $fillable = ['vaccine_name'];

    public function immunization(){
        return $this->hasMany(Immunization::class);
    }
}
