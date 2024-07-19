<?php
    session_start();
    require_once 'user.php';

    if(isUserLoggedIn()) {
        header('Location:dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iraya Home Page</title>
  <link rel="stylesheet" href="./assets/stylesheets/main.css">
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
        <li><a href="./index.php">Home</a></li>
        <li><a href="./login.php">Login</a></li>
        <li><a href="./register.php">Register</a></li>
        <li><a href="./about.php">About</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="flex center">
      <div>
        <h2 class="f-4">Welcome to Iraya</h2>
        <p>Your go-to platform for simplifying your journaling experience.</p>
        <p class="down-2">Start today and discover the benefits of keeping a
          journal.</p>
        <a href="./login.php" class="btn margin-right">Login</a>
        <a href="./register.php" class="btn">Register</a>
      </div>
      <div>
        <img src="./assets/images/welcome_img.png" alt="Welcome Image"
          class="home-image" />
        </div>
    </section>
  </main>
  <footer class="pad-1">
    <div class="text-center">
      <p>© 2024 by Iraya. All rights reserved.</p>
    </div>
  </footer>

  <button onclick="changeTheme('./assets/stylesheets')" 
    class="theme-button">Change Theme</button>
  <script src="./scripts/theme.js" 
    onload="loadTheme('./assets/stylesheets')"></script>
</body>
</html>