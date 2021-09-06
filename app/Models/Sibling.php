<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sibling extends Model
{
    use HasFactory;

    protected $table ="tbl_siblings";

    protected $fillable = [
        'sibling_info',
    ];

    public function student(){
        return $this->belongsTo(Student::class, "patient_id");
    }
}