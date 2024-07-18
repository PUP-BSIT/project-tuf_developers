<?php
    require_once 'user.php';

    $message = $_GET['message'] ?? '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm_password'];
        
        if($password == $confirm) {
          registerUser($username, $password);
          return;
        }

        $message = "Passwords don't match";
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="./assets/stylesheets/login.css" />
    <title>Document</title>
  </head>
  <body>
    <header>
      <div class="logo-container">
        <img
          src="./assets/images/iraya_logo.png"
          alt="Iraya Logo"
          class="logo"/>
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
    <div>
      <form method="POST">
        <div class="title">
          <h1>Register</h1>
        </div>
        <div>
          <label for="username">Username</label>
          <input type="text" name="username" required/>
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" name="password" required/>
        </div>
        <div>
          <label for="confirm_password">Confirm Password</label>
          <input type="password" name="confirm_password" required/>
        </div>
        <button type="submit">Register</button>
        <?= $message ?? '' ?>
      </form>
    </div>
    <section class="footer">
      <div class="copyright">
      <p>
        © 2024 by Iraya. All rights reserved.
      </p>
      </div>
    </section>
  </body>
</html>