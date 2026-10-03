<?php
 
$conn = mysqli_connect("localhost","root","","clean_blog");

if(!$conn){

  header("location: ../views/errors/404.php");

}
