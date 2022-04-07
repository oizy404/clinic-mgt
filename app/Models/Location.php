<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table ="tbl_locations";

    protected $fillable = [
        'street_address',
        'barangay',
        'city_id',
        'guardian_id'
    ];

    public function guardian(){
        return $this->belongsTo(Guardian::class, "guardian_id");
    }
    public function city(){
        return $this->belongsTo(City::class, "city_id");
    }
}
