<?php

/**
* the part one of the task the practice on the Magic methouds
*/



session_start();

class Magic{

  public $userName = "name1111"; 
  public $userEmail = "email1111";
  private $userPassowrd = "12345#$%fdfFFS";
  private $userId = "sddfs";  



  public function __invoke(){
  return "this is the test class and the user id :".$this->userId; 
  }



  public function __clone(){
  $this->userName = "name22"; 
  $this->userEmail = "email22";
  $this->userPassowrd = "432412";
  $this->userId = "sddfs22";  
  }


  public function __get($attr) {
        if ($attr == 'userId') {
            return $this->userId;
        }else if ($attr == 'userPassowrd') {
            return $this->userPassowrd;
        }

  }

  public function __toString(){
  return "name: ".$this->userName." email :".$this->userEmail; 
  }

  public function __set($attr, $value) {

        if ($attr == 'userPassowrd') {
          $this->userPassowrd = $value;
        }
  }

  public function __call($attr, $value = null) {
        if ($attr == 'login') {
        $_SESSION['loggedIn'] = true; 
        }
  }

  static function __callStatic($attr, $value = null) {
        if ($attr == 'logout') {

        $_SESSION = [];
        session_destroy();
        }
  }

}






$class = new Magic(); 


echo "user id private <br>";
echo $class->userId;

echo "<br>";

echo "user old password <br>";
echo $class->userPassowrd;

echo "<br>";

echo "user new password <br>";
echo $class->userPassowrd = 1234;

echo "<br>";

echo "default session <br>";
var_dump($_SESSION);

echo "<br>";

echo "session after login <br>";
$class->login();
var_dump($_SESSION);

echo "<br>";

echo "session after logout <br>";
Magic::logout();
var_dump($_SESSION);

echo "<br>";

$class2 = clone $class; 

echo "user name oreginal";
echo "<br>";
echo $class->userName;

echo "<br>";

echo "user name clone";
echo "<br>";
echo $class2->userName;


echo "<br>";

echo "the class as string";
echo "<br>";
echo $class;

echo "<br>";

echo "the class as function";
echo "<br>";
echo $class();
