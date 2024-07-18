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
  <main class="flex center">
    <form class="flex column width-75">
      <div class="flex column">
        <input type="text" name="journal_title" id="journal_title" 
          class="strong pad-1" value="<?= $row['journal_title'] ?>">
      </div>
      <div class="flex column">
        <div name="journal_content" contenteditable=true class="note pad-1"
          id="journal_content"><?= $row['journal_content'] ?></div>
      </div>
      <input type="hidden" id="journal_id" name="journal_id" 
        value=<?= $journalId ?>>
      <button type="button" onclick="editJournal()">Edit Journal</button>
      <div>
        <button type="button" class="edit-icon bold-icon" 
          onclick="format('bold')"></button>
        <button type="button" class="edit-icon italic-icon"
          onclick="format('italic')"></button>
        <button type="button" class="edit-icon underline-icon"
          onclick="format('underline')"></button>
        <button type="button" class="edit-icon strikethrough-icon"
          onclick="format('strikeThrough')"></button>
        <button type="button" class="edit-icon unorderedlist-icon"
          onclick="format('insertUnorderedList')"></button>
        <button type="button" class="edit-icon orderedlist-icon"
          onclick="format('insertOrderedList')"></button>
      </div>
    </form>
  </main>

  <section class="footer">
    <p class="copyright">© 2024 by Iraya. All rights reserved. </p>
  </section>

  <button onclick="changeTheme('./assets/stylesheets')" 
    class="theme-button">Change Theme</button>
  <script src="./scripts/theme.js" 
    onload="loadTheme('./assets/stylesheets')"></script>
  <script src="./scripts/edit_journal.js"></script>
</body>

</html>