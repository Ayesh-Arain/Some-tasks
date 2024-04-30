<?php
// shapes 


class Shape {
    // Triangle
    public function triangleArea($base, $height) {
        return 0.5 * $base * $height;
    }

    // Circle
    public function circleArea($radius) {
        return pi() * $radius * $radius;
    }

    // Rectangle
    public function rectangleArea($length, $width) {
        return $length * $width;
    }
}

$shape = new Shape();

echo "Area of triangle: " . $shape->triangleArea(5, 4) . "<br>";
echo "Area of circle: " . $shape->circleArea(3) . "<br>";
echo "Area of rectangle: " . $shape->rectangleArea(6, 7) . "<br>";




?>