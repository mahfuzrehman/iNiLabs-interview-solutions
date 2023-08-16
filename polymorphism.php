<?php

interface Animal {
    function makeSound();
}
class Dog implements Animal{
    public $name ="Tommy";
    public function printSound(){
        $soundOfDog = $this->name."louds at night when saw a theif.";
        return $soundOfDog;
    }
    public function makeSound(){
        return "Ghew Ghew";
    }
}
class Cat implements Animal{
    public $name = "Mini";
    public function makeSound(){
        echo "Mini sounds with Mew Mew";
    }
}
$dogSound = new Dog();
echo "The"." ".$dogSound->name." "."louds with"." ".$dogSound->makeSound()." "."at night.<br/><br/>";

$catSound = new Cat();
$catSound->makeSound();