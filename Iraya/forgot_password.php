<?php
require_once 'config.php';
require_once 'user.php';
session_start();

$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['code'];
    $username = $_POST['username'];

    $user = getUser($username);

    if($user) {
        $response = $conn->execute_query("select code from codes 
            where user_id=?", [$user['user_id']]);
        $data = $response->fetch_assoc();
    }

    if(!$username) {
        $message = "Please enter a username";
    } else if(!$user) {
        $message = "No user with that username exists";
    } else if($code != $data['code']) {
        $message = "Wrong Code!";
    } else {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];

        header('Location:change_password.php');
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
    <title>Forgot Password</title>
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
          <li><a href="./index.php">Home</a></li>
          <li><a href="./login.php">Login</a></li>
          <li><a href="./register.php">Register</a></li>
          <li><a href="./about.php">About</a></li>
        </ul>
      </nav>
    </header>
    <div class="flex center">
        <form method="POST" class="flex column width-50">
            <h1>Forgot Password</h1>
            <div class="flex column">
                <div>Username</div>
                <input type="text" name="username">
            </div>
            <div class="flex column">
                <div class="flex">
                    <span class="text-center">Enter your backup code</span>
                </div>
                <input type="text" name="code">
            </div>
            <div class="warn"><?= $message ?? '' ?></div>
            <button>Next</button>
        </form>
    </div>
    <button onclick="changeTheme('./assets/stylesheets')" 
        class="theme-button">Change Theme</button>
    <script src="./scripts/theme.js" 
        onload="loadTheme('./assets/stylesheets')"></script>
</body>
</html>