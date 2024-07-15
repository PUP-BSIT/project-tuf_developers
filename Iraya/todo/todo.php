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
    <h1>Tasks</h1>
    <a href="./add_task.php">New Task</a>
    <div id="task_list"></div>
</body>

</html>