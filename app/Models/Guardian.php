<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $table ="tbl_guardians";

    protected $fillable = [
        'complete_name', 'relationship', 'contact_number',
    ];

    public function student(){
        return $this->belongsTo(Student::class, "patient_id");
    }
    public function location(){
        return $this->hasOne(Location::class, 'location_id');
    }
}
