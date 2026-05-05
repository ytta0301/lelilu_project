<?php

class Fruit {
  public $name;
  public $color;
    function set_details($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  function get_details() {
    if ($this->color >= 10000 && $this->color < 18000) {
        echo "Merah, ";
    } elseif ($this->color > 18000 && $this->color < 30000) {
        echo "Kuning, ";
    } elseif ($this->color >= 30000)
        echo "Hijau, ";
  }
}

// class Fruit1 {
//   public $name;
//   public $color;

//   function set_details($name, $color) {
//     $this->name = $name;
//     $this->color = $color;
//   }
//   function get_details() {
//     echo "Name: " . $this->color . ". Color: " . $this->name .".<br>";
//   }
// }

// Create an object named $banana from the Fruit class
$banana = new Fruit();
$banana->set_details('Blue', 10000);
$banana->get_details();

// Create an object named $apple from the Fruit class
$apple = new Fruit();
$apple->set_details('Red', 20000);
$apple->get_details();

// Create an object named $apple from the Fruit class
$jeruk = new Fruit();
$jeruk->set_details('green', 100000);
$jeruk->get_details();

 
?>
