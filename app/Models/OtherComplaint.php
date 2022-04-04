<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherComplaint extends Model
{
    use HasFactory;

    protected $table ="tbl_other_chief_complaints";

    protected $fillable = [
        'other_chief_complaint',
        'complaints_id'
    ];

    public function complaint(){
        return $this->belongsTo(Complaint::class, "complaints_id");
    }
}
