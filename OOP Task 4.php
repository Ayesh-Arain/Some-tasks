<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
</head>
<body>
    <h1>Student Information System</h1>
    <form method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br>
        
        <label for="grade">Grade:</label><br>
        <input type="text" id="grade" name="grade" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    class Student {
        private $name;
        private $age;
        private $grade;

        // Setter methods
        public function setName($name) {
            $this->name = $name;
        }

        public function setAge($age) {
            $this->age = $age;
        }

        public function setGrade($grade) {
            $this->grade = $grade;
        }

        // Getter methods
        public function getName() {
            return $this->name;
        }

        public function getAge() {
            return $this->age;
        }

        public function getGrade() {
            return $this->grade;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $student = new Student();
        $student->setName($_POST["name"]);
        $student->setAge($_POST["age"]);
        $student->setGrade($_POST["grade"]);

        echo "<h2>Student Information:</h2>";
        echo "<p><strong>Name:</strong> " . $student->getName() . "</p>";
        echo "<p><strong>Age:</strong> " . $student->getAge() . "</p>";
        echo "<p><strong>Grade:</strong> " . $student->getGrade() . "</p>";

    }
    ?>
</body>
</html>