<?php


class Product{

  public $name;

  public $price;

  public $description;

  public $image;

  public function _construct($name,$price,$description,$image){

  $this->name = $name;
  $this->price = $price;
  $this->description = $description;
  $this->image = $image;
  }


 public function uploadImg(){};
 public function calcPrice(){};


}


class Book extends Product{

  public $publsher;

  public $writer;

  public $color;

  public $supplire;

  public function chooshPub(){}

  public function setPub(){}

  public function showAllPubs(){}

}



class BabyCar extends Product{

  public $age;

  public $waight;

  public $material;


  public function _construct($age,$waight,$material){

  $this->age = $age;
  $this->waight = $waight;
  $this->material = $material;
}


  public function displayMaterial(){}

  public function getPrice(){}

}





