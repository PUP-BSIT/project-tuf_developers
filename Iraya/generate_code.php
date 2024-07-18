<?php
require_once 'config.php';
require_once 'user.php';
session_start();

if(!isUserLoggedIn()) {
    header('Location:login.php');
}

$username = $_SESSION['username'];

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $userId = $_SESSION['user_id'];

    $response = $conn->execute_query("select code from codes 
        where user_id='$userId'");
    $data = $response->fetch_assoc();
    
    if(!$data) {
        $conn->execute_query("insert into codes(code_id,user_id,code) 
            select concat('c',max(index_id)), ?, UUID() 
            from codes", [$userId]);
        
        $response = $conn->query("select code from codes 
            where user_id='$userId'");
        $data = $response->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/stylesheets/main.css">
    <link id="theme" rel="stylesheet" href="./assets/stylesheets/light.css">
    <title>Backup Code</title>
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
    <main class="flex center column">
        <h3>Here's your Backup Code</h3>
        <p>In case you forgot your password.</p>
        <button onclick="downloadCode()">Download Code</button>
        <input id="code" class="width-50" value="<?= $data['code'] ?>" 
            disabled>
        <hr class="width-50">
        <a href="./dashboard.php?remind=<?= $username ?>" class="btn">Next</a>
    </main>
    <script src="./scripts/generate_code.js"></script>
    <button onclick="changeTheme('./assets/stylesheets')" 
        class="theme-button">Change Theme</button>
    <script src="./scripts/theme.js" 
        onload="loadTheme('./assets/stylesheets')"></script>
</body>
</html>