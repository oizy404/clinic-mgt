<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalSupply extends Model
{
    use HasFactory;

    protected $table ="tbl_medical_supplies";

    protected $fillable = [
        'product_name',
        'med_type_id',
        'quantity',
        'stock',
        'expiry_date',
        'purchase_date',
    ];

    public function med_type(){
        return $this->belongsTo(MedType::class, 'med_type_id');
    }
}
