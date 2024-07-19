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
    <title>Memory Game</title>
    <link rel="stylesheet" href="./assets/stylesheets/main.css">
    <link rel="stylesheet" href="./assets/stylesheets/memory_game.css">
    <link id="theme" rel="stylesheet" href="./assets/stylesheets/light.css">
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
                <li><a href="./memory_game.php">Game</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section class="flex center column">
        <h1>Memory Matching Game</h1>
        <div class="game-container" id="game_container"></div>
        <div class="reset-button">
           <button id="reset_button">Reset</button>
        </div>
    </section>
    <script src="./scripts/memory_game.js"></script>
    <button onclick="changeTheme('./assets/stylesheets')" 
        class="theme-button">Change Theme</button>
    <script src="./scripts/theme.js" 
        onload="loadTheme('./assets/stylesheets')"></script>
</body>
</html>