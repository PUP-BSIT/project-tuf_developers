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
    <link rel="stylesheet" href="../assets/stylesheets/main.css">
    <link id="theme" rel="stylesheet" href="../assets/stylesheets/light.css">
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
                <li><a href="../dashboard.php">Dashboard</a></li>
                <li><a href="../journal_manager.php">Journal</a></li>
                <li><a href="#">Tasks</a></li>
                <li><a href="../mood/index.php">Mood</a></li>
                <li><a href="../memory_game.php">Game</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <h1>Tasks</h1>
    <div class="flex down-2">
        <button type="button" onclick="newTask()">New Task</button>
        <select id="sort_tasks" class="grow-1" oninput="sortDate()">
            <option value="date_descending">Sort by Date: Descending</option>
            <option value="date_ascending">Sort by Date: Ascending</option>
        </select>
    </div>
    
    <div id="task_list" class="flex gap wrap around"></div>
    <button onclick="changeTheme('../assets/stylesheets')" 
        class="theme-button">Change Theme</button>
    <script src="todo.js"></script>
    <script src="../scripts/theme.js" 
        onload="loadTheme('../assets/stylesheets')"></script>
</body>

</html>