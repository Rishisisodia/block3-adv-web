<?php

ini_set('display_errors', 1);

class TVRemote {
    public $brand;
    private $color;
    private $batteryLife;
    private $price;

    public function __construct($brand, $color, $batteryLife, $price) {
        $this->brand = $brand;
        $this->color = $color;
        $this->batteryLife = $batteryLife;
        $this->price = $price;
    }

    public function getBrand() {
        return $this->brand;        
    }

    public function batteryLifeRule() {
        if ($this->batteryLife >= 50) {
            return "Long battery life";
        } else {
            return "Short battery life";
        }
    }

    public function colorRule() {
        return $this->color;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        if ($price > 100) {
            $discountedPrice = $price * 0.8; // 20% discount for expensive remotes
            $this->price = $discountedPrice;
        } else {
            $this->price = $price;
        }
    }
}

$remote1 = new TVRemote("Samsung", "Black", 70, 120);
echo "Brand: " . $remote1->getBrand() . "<br>";
echo "Battery Life Rule: " . $remote1->batteryLifeRule() . "<br>";
echo "Color Rule: " . $remote1->colorRule() . "<br>";
$remote1->setPrice(120);
echo "Price: " . $remote1->getPrice() . "<br>";

$remote2 = new TVRemote("Sony", "Silver", 40, 80);
echo "Brand: " . $remote2->getBrand() . "<br>";
echo "Battery Life Rule: " . $remote2->batteryLifeRule() . "<br>";
echo "Color Rule: " . $remote2->colorRule() . "<br>";
$remote2->setPrice(80);
echo "Price: " . $remote2->getPrice() . "<br>";
?>
