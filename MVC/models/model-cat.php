<?php

include_once('models/animal.php');

class Cat extends Animal
{
    public function makeSound()
    {
        echo "The cat quarrels.";
    }
}
