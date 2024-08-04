<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'phone_number',
        'lead_source_id',
        'email',
        'message_id',
        'chat_id',
    ];
}
