<?php 
namespace App\Http\Requestes;

class GetError {
    public static function Message($message)
    {
        return ucwords(str_replace('_',' ',$message));
    }
}