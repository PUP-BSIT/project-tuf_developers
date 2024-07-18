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
    <link rel="stylesheet" href="./assets/stylesheets/main.css"/>
    <link id="theme" rel="stylesheet" href="./assets/stylesheets/light.css">
    <title>Add Journal</title>
  </head>
  <body>
  <header class="down-1">
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
    <main>
      <section class="journal">
        <div class="journal-container">
          <h1>Title</h1>
          <input id="journal_title" placeholder="Add your entry title here">
          <button onclick="insertJournal()">
            <img src="./assets/images/edit_image.png" alt="edit"/>Create Entry
          </button>
          <div class="notes-container">
            <textarea id="journal_content" class="input-box" 
              name="journal-content"></textarea>
          </div>
        </div>
      </section>
    </main>
    <section class="footer">
      <div class="copyright">
      <p>
        © 2024 by Iraya. All rights reserved.
      </p>
      </div>
    </section>
    <script src="./scripts/add_journal.js"></script>
  </body>
</html>