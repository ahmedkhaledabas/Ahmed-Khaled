<?php
namespace App\Http\Requests;

use App\Database\Config\Connection;
use App\Http\Requests\GetError;

class Validation {
    private array $errors = [];
    private $valueName;
    private $value;

    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set the value of valueName
     *
     * @return  self
     */ 
    public function setValueName($valueName)
    {
        $this->valueName = $valueName;

        return $this;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function required()
    {
       if(empty($this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} required");
       }
       return $this;
    }

    public function confirmed($comparedValue)
    {
        if($this->value != $comparedValue){
            $this->errors[$this->valueName.'_confirmation'][__FUNCTION__] = GetError::Message("{$this->valueName}
             not confirmed ");
        }
        return $this;
    }

    public function max($max)
    {
        if(strlen($this->value) > $max){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} must be less than {$max} characters");
        }
        return $this;
    }

    public function digits($digits)
    {
        if(strlen($this->value) != $digits){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} must be {$digits} digits");
        }
        return $this;
    }

    public function integer()
    {
        if(!ctype_digit($this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} must be ". __FUNCTION__);
        }
        return $this;
    }

    public function regex($regularExpression,$message = "Invailed")
    {
        if(!preg_match($regularExpression,$this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} {$message}");
        }
        return $this;
    }

    public function in($array)
    {
        if(!in_array($this->value,$array)){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} must be ".implode(',',$array));
        }
        return $this;
    }

    public function unique(string $table,string $column = "")
    {
        if(!$column){
            $column = $this->valueName;
        }
        $connection = new Connection;
        $stmt = $connection->con->prepare("SELECT * FROM `{$table}` WHERE {$column} = ?");
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        if($stmt->get_result()->num_rows == 1 ){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} Already Exists");
        }
        return $this;
    }
   
    public function exists(string $table,string $column = "")
    {

        if(!$column){
            $column = $this->valueName;
        }
        $connection = new Connection;
        $stmt = $connection->con->prepare("SELECT * FROM `{$table}` WHERE {$column} = ?");
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        if($stmt->get_result()->num_rows != 1){
            $this->errors[$this->valueName][__FUNCTION__] = GetError::Message("{$this->valueName} Not Exists");
        }
        return $this;
    }
}
