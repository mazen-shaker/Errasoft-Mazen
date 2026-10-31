<?php
require_once './CartItem.php';

session_start();
class Cart{

public array $items;
public int $total;

  public function __construct(){
  $this->items = $_SESSION['items'] ?? [];
  $this->total = $_SESSION['total'] ?? 0;
  }

  protected function calculateTotal(){

  $this->total = 0;
    
  foreach ($this->items as $item) {
    $this->total += ($item->product->price * $item->count);
  }    
  $_SESSION['total'] = $this->total;
  }


  protected function addToSession($item){
  $_SESSION['items'][] = $item;
  }

  public function addToCart($product){

  foreach ($this->items as $item) {
     if($item->product->id == $product->id){
     $item->count++;
     $this->calculateTotal(); 
     return;
     } 
  }
  $item = new CartItem(1,$product);
  $this->items[] = $item;
  $this->calculateTotal();
  $this->addToSession($item);
  }

}
