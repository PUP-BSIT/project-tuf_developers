<?php
session_start();
require_once 'user.php';

if (!isUserLoggedIn()) {
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
  <title>Journals</title>
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
  <h1>Journals</h1>
  <div class="flex down-1">
    <a href="./add_journal.php" class="btn">Add Journal</a>
    <input id="search" type="text" class="grow-6">
    <button class="grow-1" onclick="searchJournals()">Search</button>
    <select id="sort_journals" class="grow-1" oninput="sortDate()">
      <option value="date_descending">Sort by Date: Descending</option>
      <option value="date_ascending">Sort by Date: Ascending</option>
    </select>
  </div>
  <section class="footer">
    <div class="copyright">
      <p> © 2024 by Iraya. All rights reserved.</p>
      </div>
    </section>
  <script src="./scripts/journal_manager.js"></script>
</body>
</html>