<?php


class Product{

  public $name;
  public $description;
  public $brand;
  
  public $price;
  public $tax;

 
  public function __construct($name, $description, $discount, $brand, $price, $tax)
  {
   $this->name = $name;
   $this->description = $description;
   $this->brand = $brand;

   $this->discount = $discount;
   $this->price = $price;
   $this->tax = $tax;
  }

  public function getName(){return $this->name;}

  public function priceAfterDiscount(){return $this->price * ($this->discount / 100); }

  public function getFinalPrice(){return $this->price * ($this->tax / 100) - $this->priceAfterDiscount($this->discount);}
 
}

$product = new Product("lenovo tap", "this is technical device", 10,"Lenovo" , 20000,14);
?>

<table style="border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">product name</th>
            <th style="border: 1px solid black;">description</th>
            <th style="border: 1px solid black;">brand</th>
            <th style="border: 1px solid black;">price</th>
            <th style="border: 1px solid black;">tax</th>
            <th style="border: 1px solid black;">discount</th>
            <th style="border: 1px solid black;">final price</th>
    </tr>
    </thead>

    <tbody>
        <tr>
            <td style="border: 1px solid black;"><?=$product->getName()?></td>
            <td style="border: 1px solid black;"><?=$product->description?></td>
            <td style="border: 1px solid black;"><?=$product->brand?></td>
            <td style="border: 1px solid black;"><?=$product->price?></td>
            <td style="border: 1px solid black;"><?=$product->tax?>%</td>
            <td style="border: 1px solid black;"><?=$product->discount?>%</td>
            <td style="border: 1px solid black;"><?=$product->getFinalPrice()?></td>
    </tr>
    </tbody>
</table>
