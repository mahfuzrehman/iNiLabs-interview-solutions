<?php
class Geomatricshaps{
    // we need length and width for the calculation of rectangle area.
    
    public $length = 50;
    public $width = 40;
    protected $pi = 3.1416;
    protected $r = 5;

    public function areaOfRectangles(){
        $rectangle = $this->length*$this->width;
        return $rectangle;
    }

}
$calc = new Geomatricshaps;
echo "The area of rectangle is:"." ".$calc->areaOfRectangles()."<br/><br/>"; 

//Code for Circle.

class Circle extends Geomatricshaps{
    public function circle(){
        $getPi = $this->pi;
        $getr = $this->r;

        return $calcCircle = $getPi*$getr*$getr;
    }
}
$res = new Circle;
echo "The area of circle is:"." ".$res->circle();