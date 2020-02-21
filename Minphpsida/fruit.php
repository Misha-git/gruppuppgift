<?php 

echo "<h1>Klasser yo!</h1>";

class Product {

    private $name; 
    private $color;

    function _construct($name_IN, $color_IN){
        $this->name = $name_IN; 
        $this->color = $color_IN;
    }

public function getName() {
    return $this->name;
    }

}

$jacka = new Product("Cool jacka", "Beige"); 
$jacka->name ="Cool jacka"; 


echo "<br />";

$dataMaskin = new Product("Datamaskin", "HP", "grå");
$dataMaskin->name ="Data 2000";
echo $dataMaskin->name;
echo $jacka->name; 