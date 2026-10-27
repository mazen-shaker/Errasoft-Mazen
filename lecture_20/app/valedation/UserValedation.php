<?php

class UserValedation{

    protected function required($value)
    {
      return $value !== null && $value !== '';
    }

    protected function max($value, $parameter)
    {
      return mb_strlen((string) $value) <= (int) $parameter;
    }

    protected function min($value, $parameter)
    {
     return mb_strlen((string) $value) >= (int) $parameter;
    }

    protected function email($value)
    {
     return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    } 













  public function valedate(){
    
    $isvalid = true;
  foreach ($this->rules() as $field => $rules) {

      $value = $_POST[$field] ?? null;

      foreach($rules as $rule){
   
      $parts = explode(':', $rule, 2);

      $ruleName = $parts[0];
      $parameter = $parts[1] ?? null;
   
    $resault = match ($ruleName) {
    'required' => $this->required($value),
    'max'      => $this->max($value, $parameter),
    'min'      => $this->min($value, $parameter),
    'email'    => $this->email($value),
     default    => "undefined rule name $ruleName"
     };

     if (!$resault) {
      $isvalid = false;
    }
     
  }
  }
  
 return $isvalid; 
  
}



 public function rules(){
   
   return [
     'user_name' => ["required", "max:10", "min:4"],
     'email' => ["required", "email"],
     'password' => ["required", "max:12", "min:8"]
    ];
  
 }



}
