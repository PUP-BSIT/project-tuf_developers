<?php
session_start();
require_once 'user.php';

if (!isUserLoggedIn()) {
  header('Location:login.php');
}

$journalId = $_GET['journal_id'] ?? '';
$result = getJournal($journalId);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Journal</title>
  <link rel="stylesheet" href="./assets/stylesheets/main.css" />
  <link id="theme" rel="stylesheet" href="./assets/stylesheets/light.css">
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

  <a href="./journal_manager.php" class="btn">Back</a>
  <form>
    <div>
      <label for="journal_title">Title</label>
      <input type="text" name="journal_title" id="journal_title" 
          value="<?= $row['journal_title'] ?>">
    </div>
    <div>
    <label for="journal_content">Content</label>
    <textarea name="journal_content" 
        id="journal_content"><?= $row['journal_content'] ?></textarea>
    </div>
    <input type="hidden" id="journal_id" name="journal_id" 
            value=<?= $journalId ?>>
        <button type="button" onclick="editJournal()">Edit Journal</button>
  </form>

  <section class="footer">
    <p class="copyright">© 2024 by Iraya. All rights reserved. </p>
  </section>

  <script src="./scripts/edit_journal.js"></script>
</body>
</html>