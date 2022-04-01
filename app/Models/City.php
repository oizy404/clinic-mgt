<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table ="tbl_cities";

    protected $fillable = [
        'city',
        'province_id'
    ];

    public function location(){
        return $this->hasMany(Location::class, "city_id");
    }
    public function province(){
        return $this->belongsTo(Province::class, "province_id");
    }
    
}
