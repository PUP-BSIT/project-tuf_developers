<?php
session_start();

if (!$_SESSION['user_id']) {
    header('Location:../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../mood/modal.css">
    <link rel="stylesheet" href="./style.css">
    <title>To Do List</title>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="../assets/images/logo.png" alt="Iraya Logo" class="logo" />
            <div class="logo-text">
                <h1>Iraya</h1>
                <p>Simplify Your Journaling Experience</p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../journal_manager.php">Journal</a></li>
                <li><a href="#">Tasks</a></li>
                <li><a href="../mood/index.php">Mood</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <a href="./todo.php" class="btn margin-down margin-up">Cancel</a>
    <div>
        <input type="text" 
            id="title" 
            class="input-title" 
            placeholder="Add your title here">
    </div>
    <div class="flex">
        <div class="card">
            <h1>To Do</h1>
            <div id="todo" class="flex gap column"></div>
            <button onclick="addToDo()">Add new task</button>
        </div>
        <div class="card">
            <h1>In Progress</h1>
            <div id="in_progress" class="flex gap column"></div>
        </div>
        <div class="card">
            <h1>Completed</h1>
            <div id="completed" class="flex gap column"></div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>