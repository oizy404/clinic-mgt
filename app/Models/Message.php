<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table ="tbl_messages";

    protected $fillable = [
        'message',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'sender','receiver');
    }
}
