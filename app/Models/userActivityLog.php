<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userActivityLog extends Model
{
    use HasFactory;

    protected $table ="user_activity_logs";

    protected $fillable = [
        'user_name',
        'email',
        'phone_number',
        'status',
        'password',
        'role',
        'modify_user',
        'date_time',
    ];
}
