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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/stylesheets/add_journal.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet" />
    <title>Add Journal</title>
  </head>
  <body>
    <header>
      <div class="logo-container">
        <img
          src="../Iraya/assets/images/logo.png"
          alt="Iraya Logo"
          class="logo"
        />
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
      <section class="journal">
        <div class="journal-container">
          <h1>
            <img src="./assets/images/note_image.png" alt="note_img" />Add
            your entry here
          </h1>
          <button>
            <img src="./assets/images/edit_image.png" alt="" />Create Entry
          </button>
          <div class="notes-container">
            <p contenteditable="true" class="input-box">
              <img
                src="./assets/images/delete_image.png"
                alt="delete_image"
              />
            </p>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">
      <p class="copyright">© 2024 by Iraya. All rights reserved.</p>
    </footer>
    <script src="./scripts/add_journal.js"></script>
  </body>
</html>
