<?php 
namespace App\Http\Requests;

class GetError {
    public static function Message($message)
    {
        return ucwords(str_replace('_',' ',$message));
    }
}