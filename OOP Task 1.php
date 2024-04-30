<?php

class MultiplicationTable {
    private $number;

    public function __construct($number) {
        $this->number = $number;
    }

    public function printTable() {
        echo "Table of {$this->number}:\n";
        for ($i = 1; $i <= 10; $i++) {
            $result = $this->number * $i; echo "<br>";
            echo "{$this->number} * $i = $result\n";
        }
    }
}

// Create an instance of MultiplicationTable for the number 3
$table = new MultiplicationTable(3);
$table->printTable();

?>











