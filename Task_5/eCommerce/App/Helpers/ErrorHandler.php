<?php
namespace App\Helpers;

class ErrorHandler {
    public static function get(string $errorKey) :?string
    {
        if(isset($_SESSION['errors'][$errorKey])){
            foreach ($_SESSION['errors'][$errorKey] as $value) {
                return ErrorHandler::template($value);
            }
        }
        return null;
    }

    public static function display() :?string
    {
        $message = null;
        if(isset($_SESSION['errors'])){
            foreach($_SESSION['errors'] AS $errors){
                foreach($errors AS $error){
                    $message .= ErrorHandler::template($error);
                    break;
                }
            }
        }
        return $message;
    }


    public static function template(string $value)
    {
        return "<p class='alert alert-danger font-weight-bold'>{$value}</p>";
    }

}

