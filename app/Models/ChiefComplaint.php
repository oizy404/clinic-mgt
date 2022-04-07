<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiefComplaint extends Model
{
    use HasFactory;

    protected $table ="tbl_chief_complaints";

    protected $fillable = [
        'chief_complaint',
        
    ];

    public function complaint(){
        return $this->hasMany(Complaint::class, "chief_complaints_id");
    }
}
