<?php

session_start();

include './config/db.php';

include './views/components/nav.php';

include './views/components/header.php'; 


$page = isset($_GET['page']) ? $_GET['page'] : "home";


switch ($page) {
  case 'home': 
  include './controller/PostController.php';
  $posts = indexPost();
  include './views/main/home.php';
  break;
 
  
  case 'about': 
  include './views/main/about.php';
  break; 


  case 'contact': 
  include './views/main/contact.php';
  break; 


  case 'create-post': 
  include './views/posts/create.php';
  break; 

  case 'store-post': 
  include './controller/PostController.php';
  storePost();  
  break; 



  case 'update-post': 
  include './controller/PostController.php';
  updatePost();  
  break; 


  case 'edit-post': 
  include './controller/PostController.php';
  $post = editPost($_GET['id']);
  include './views/posts/edit.php';
  break; 

  case 'destroy-post': 
  include './controller/PostController.php';
  $post = destroyPost($_GET['id']);
  break; 

  default:
  include './views/errors/404.php';
  break;
}



include './views/components/footer.php'; 

include './views/components/scripts.php'; 


