<?php
require_once 'config.php';
require_once 'user.php';
session_start();

if(!isUserLoggedIn()) {
    header('Location:login.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $userId = $_SESSION['user_id'];

    $response = $conn->execute_query("select password from users 
        where user_id=?", [$userId]);
    $data = $response->fetch_assoc();
    
    if($password == $data['password']) {
        $message = "Password must be not the same";
    } else {
        $conn->execute_query("update users set password=? 
            where user_id=?", [$password, $userId]);
        
        header('Location:change_password.php?message=Changed Successfully!');
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
    <title>Change Password</title>
</head>

<body>
    <header class="down-3">
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
    <div class="flex column center down-6">
        <form method="POST" class="flex column width-50">
            <div class="title">
                <h1>Change Password</h1>
            </div>
            <div class="flex column warning-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" 
                    oninput="validatePassword(this)" required />
                <div id="password_message" class="warn"></div>
            </div>
            <div class="flex column warning-container">
                <label for="confirm">
                    Confirm Password
                </label>
                <input type="password" id="confirm" name="confirm_password" 
                    oninput="validatePassword(this)" required />
                <div id="confirm_message" class="warn"></div>
            </div>
            <div id="message" class="warn"> <?= $message ?? '' ?> </div>
            <button type="submit">Change Password</button>
        </form>
    </div>
    <button onclick="changeTheme('./assets/stylesheets')" 
        class="theme-button">Change Theme</button>
    <script src="./scripts/theme.js" 
        onload="loadTheme('./assets/stylesheets')"></script>
    <script src="./scripts/change_password.js"></script>
</body>

</html>