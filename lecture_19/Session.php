<?php

session_start();



class Session{

// public function __construc(){}

  public function get($injetedKey){

    foreach ($_SESSION as $key => $value) {
      if($injetedKey == $key){
      return $value;
      }else{

      return "sorry this key is not found :(";

      } 
    }

    
  }

  public function add($injetedKey){

  $_SESSION[$injetedKey] = ['name'=> "your name", 'pasword' => "your hashed password",];
    
  }

  public function set($injetedKey,$injetedvalues){

    foreach ($_SESSION as $key => $value) {
      if($injetedKey == $key){
      foreach ($injetedvalues as $injetedvalue) {
         $newName = "index".count($_SESSION[$key]);
         $_SESSION[$key][$newName] = $injetedvalue; 
      }
      }else{
        return "sorry this key is not found :(";
      }
    }

    
  }

  public function flash($injetedKey){

     foreach ($_SESSION as $key => $value) {
      if($injetedKey == $key){
        $savedValue = $value;
        unset($_SESSION[$key]);
        return $savedValue;
      }else{

      return "sorry this key is not found :(";

      } 
    }   

  }


  public function remove($injetedKey){

     foreach ($_SESSION as $key => $value) {
      if($injetedKey == $key){
        unset($_SESSION[$key]);
      }else{

      return "sorry this key is not found :(";

      } 
    }   

  }

  public function removeAll($injetedKey){
        
    session_destroy();

  }

  public function getAll(){
        
    return $_SESSION();

  }

  public function has($injetedKey){

    foreach ($_SESSION as $key => $value) {
      if($injetedKey == $key){
        return "this key (".injetedKey.") is found";
      }else{

      return "sorry this key is not found :(";

      } 
    }

    
  }

}


$sessionClass = new Session();

$sessionClass->add(100);

var_dump($sessionClass->flash(100));
echo "<br>";
var_dump($_SESSION);
