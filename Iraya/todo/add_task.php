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
    <a href="./" class="btn margin-down margin-up">Cancel</a>
    <div class="flex">
        <div class="card h-2">
            <h1>To Do</h1>
            <div id="todo" class="flex gap column">
                <div class="flex">
                    <input type="checkbox" class="">
                    <input type="text" class="task-card">
                </div>
                
            </div>
            <button>Add new task</button>
        </div>
        <div class="card h-2">
            <h1>In Progress</h1>
            <div id="in_progress">
                <div>
                    <input type="checkbox" class="">
                    <input type="text" class="task-card">
                </div>
            </div>
        </div>
        <div class="card h-2">
            <h1>Completed</h1>
            <div id="completed"></div>
        </div>
    </div>
</body>

</html>