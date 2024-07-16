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
    <link rel="stylesheet" href="style.css">
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
    <div class="flex margin-down">
        <button type="button" onclick="newTask()">New Task</button>
        <select id="sort_tasks" class="grow-1" oninput="sortDate()">
            <option value="date_descending">Sort by Date: Descending</option>
            <option value="date_ascending">Sort by Date: Ascending</option>
        </select>
    </div>
    
    <div id="task_list" class="flex gap wrap around">
        <div class="card fit inverted">
            <div class="flex right">
                <button class="more-icon inverted-btn"></button>
            </div>
            <div class="btn inverted-btn">To-Do: 3</div>
            <div class="btn inverted-btn">In Progress: 2</div>
            <div class="btn inverted-btn">Completed: 4</div>
        </div>

        <div class="card fit">
            <div class="flex right">
                <button class="more-icon"></button>
            </div>
            <div class="btn">To-Do: 3</div>
            <div class="btn">In Progress: 2</div>
            <div class="btn">Completed: 4</div>
        </div>

        <div class="card fit">
            <div class="flex right">
                <button class="more-icon"></button>
            </div>
            <div class="btn">To-Do: 3</div>
            <div class="btn">In Progress: 2</div>
            <div class="btn">Completed: 4</div>
        </div>

        <div class="card fit">
            <div class="flex right">
                <button class="more-icon"></button>
            </div>
            <div class="btn">To-Do: 3</div>
            <div class="btn">In Progress: 2</div>
            <div class="btn">Completed: 4</div>
        </div>
    </div>
    <script src="todo.js"></script>
</body>

</html>