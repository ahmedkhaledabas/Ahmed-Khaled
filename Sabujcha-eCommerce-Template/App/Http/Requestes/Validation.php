<?php
namespace App\Http\Requestes;

use App\Database\Config\Connection;
use App\Http\Requestes\GetError;

class Validation {
    private array $errors = [];
    private $valueName;
    private $value;

    public function getErrors()
    {
        return $this->errors;
    }

    
    public function setValueName($valueName)
    {
        $this->valueName = $valueName;

        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


    //check if user write in input or not
    public function required()
    {
       if(empty($this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} required");
       }
      
       return $this;
    }

}
