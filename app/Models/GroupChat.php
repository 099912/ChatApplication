<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    use HasFactory;
    // public $table="groups_chat";

    protected $fillable=[
        'sender_id',
        'group_id',
        'message',
        ];

}
