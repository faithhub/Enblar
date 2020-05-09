<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletters';
    protected $fillable = [
        'subject', 'bodyMessage', 'status',
    ];

//    public static function where(string $string, string $string1)
//    {
//    }
//    public static function count()
//    {
//    }
}
