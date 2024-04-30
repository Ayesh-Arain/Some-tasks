<?php

class TemperatureConverter {
    public function celsiusToFahrenheit($celsius) {
        return ($celsius * 9/5) + 32;
    }
}

// Usage
$converter = new TemperatureConverter();
$celsius = 25;
$fahrenheit = $converter->celsiusToFahrenheit($celsius);
echo "{$celsius}°C is equal to {$fahrenheit}°F";

?>