<?php

class Calculators {
    public function add($num1, $num2) {
        return $num1 + $num2;
    }
    
    public function subtract($num1, $num2) {
        return $num1 - $num2;
    }
    
    public function multiply($num1, $num2) {
        return $num1 * $num2;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $calculator = new Calculators();
    
   
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];
   
    switch ($operation) {
        case "addition":
            $result = $calculator->add($num1, $num2);
            break;
        case "subtraction":
            $result = $calculator->subtract($num1, $num2);
            break;
        case "multiplication":
            $result = $calculator->multiply($num1, $num2);
            break;
        default:
            $result = "Invalid operation";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calculator {
            max-width: 300px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color:pink;
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: pink;
            color: pink;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: green;
        }
        .result {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Calculator</h2>
    <form method="post">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <input type="number" name="num2" placeholder="Enter second number" required>
        <select name="operation">
            <option value="addition">Addition</option>
            <option value="subtraction">Subtraction</option>
            <option value="multiplication">Multiplication</option>
        </select>
        <input type="submit" value="Calculate">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result">Result: <?php echo isset($result) ? $result : ''; ?></div>
    <?php endif; ?>
</div>

</body>
</html>
