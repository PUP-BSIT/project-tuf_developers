<?php
    session_start();
    require_once 'user.php';

    if(!isUserLoggedIn()) {
        header('Location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/stylesheets/main.css">
    <link id="theme" rel="stylesheet" href="./assets/stylesheets/light.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="./assets/images/logo.png" alt="Iraya Logo" class="logo" />
            <div class="logo-text">
                <h1>Iraya</h1>
                <p>Simplify Your Journaling Experience</p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="./dashboard.php">Dashboard</a></li>
                <li><a href="./journal_manager.php">Journal</a></li>
                <li><a href="./todo/todo.php">Tasks</a></li>
                <li><a href="./mood/index.php">Mood</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <h1>Dashboard</h1>
    <div class="flex around">
        <div class="chart-container">
            <h2>Journal Entries Frequency</h2>
            <canvas id="journal"></canvas>
    </div>
        <div class="chart-container">
            <h2>Overall Task Progress</h2>
            <canvas id="task"></canvas>
        </div>
        <div class="chart-container">
            <h2>Overall Mood Chart</h2>
            <canvas id="mood"></canvas>
        </div>
    </div>
    <button onclick="changeTheme('./assets/stylesheets')" 
        class="theme-button">Change Theme</button>
    <script src="./scripts/dashboard.js"></script>
    <script src="./scripts/theme.js" 
        onload="loadTheme('./assets/stylesheets')"></script>
</body>
</html>