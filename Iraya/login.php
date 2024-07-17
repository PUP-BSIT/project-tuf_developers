<?php
    require_once 'user.php';
    session_start();

    $message = $_GET['message'] ?? '';

    if(isUserLoggedIn()){
        header('Location:journal_manager.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        loginUser($username, $password);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/stylesheets/main.css" />
    <link id="theme" rel="stylesheet" href="./assets/stylesheets/light.css">    
    <title>Login</title>
  </head>
  <body>
    <header class="down-5">
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
    <div class="flex center down-6">
      <form method="POST" class="flex column width-50">
        <div class="title">
          <h1>Login</h1>
        </div>
        <div class="flex column">
          <label for="username">Username</label>
          <input type="text" name="username" required />
        </div>
        <div class="flex column">
          <label for="password">Password</label>
          <input type="password" name="password" required />
        </div>
        <div> <?= $message ?? '' ?> </div>
        <button type="submit">Login</button>
      </form>
    </div>
    <section class="footer">
      <div class="copyright text-center">
      <p>
        © 2024 by Iraya. All rights reserved.
      </p>
      </div>
    </section>
    <button onclick="changeTheme('./assets/stylesheets')" 
      class="theme-button">Change Theme</button>
    <script src="./scripts/login.js"></script>
    <script src="./scripts/theme.js" 
      onload="loadTheme('./assets/stylesheets')"></script>
  </body>
</html>