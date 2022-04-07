<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table ="tbl_messages";

    protected $fillable = [
        'sender',
        'message',
        'img_file',
        'event_id',
        'receiver',
        'read',
    ];

    public function user(){
        return $this->belongsTo(User::class, "sender","receiver");
    }
    public function event(){
        return $this->belongsTo(Event::class, "event_id");
    }
}
