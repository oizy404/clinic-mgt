<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table ="tbl_locations";

    protected $fillable = [
        'street_address', 'barangay',
    ];

    public function guardian(){
        return $this->hasOne(Guardian::class, 'location_id');
    }
    public function city(){
        return $this->belongsTo(Barangay::class, 'city_id');
    }
}
