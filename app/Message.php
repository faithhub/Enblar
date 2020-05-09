<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = [
        'full_name', 'email', 'message',
    ];

//    public static function where(string $string, $id)
//    {
//    }
}
