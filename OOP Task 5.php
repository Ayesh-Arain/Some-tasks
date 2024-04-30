<?php
session_start();

class TodoList {
    public function addTask($task) {
        $_SESSION['tasks'][] = $task;
    }

    public function removeTask($index) {
        if (isset($_SESSION['tasks'][$index])) {
            unset($_SESSION['tasks'][$index]);
        }
    }

    public function displayTasks() {
        if (isset($_SESSION['tasks'])) {
            foreach ($_SESSION['tasks'] as $index => $task) {
                echo "<li>$task <button onclick='removeTask($index)'>Remove</button></li>";
            }
        }
    }
}

// Create a TodoList object
$todoList = new TodoList();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input value
    $task = $_POST["task"];

    // Add task to the list
    $todoList->addTask($task);
}

// Check if remove button is clicked
if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    $todoList->removeTask($index);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid #007bff;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: space-between;
        }

        li:hover {
            background-color: #f0f0f0;
        }

        button {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>To-Do List</h1>
    <form method="post">
        <input type="text" name="task" placeholder="Enter task" required>
        <input type="submit" value="Add Task">
    </form>
    <ul>
        <?php
        // Display tasks
        if (!empty($todoList)) {
            $todoList->displayTasks();
        }
        ?>
    </ul>
</div>

<script>
    function removeTask(index) {
        if (confirm("Are you sure you want to remove this task?")) {
            window.location = "todo.php?remove=" + index;
        }
    }
</script>

</body>
</html>
