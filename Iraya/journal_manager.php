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
  <link rel="stylesheet" href="./assets/stylesheets/journal_manager.css">
  <title>Journals</title>
</head>
<body>
<header>
	<div class="logo-container">
      <img src="../assets/images/logo.png" alt="Iraya Logo" class="logo" />
      <div class="logo-text">
        <h1>Iraya</h1>
        <p>Simplify Your Journaling Experience</p>
      </div>
    </div>
		<nav>
			<ul>
				<li><a href="./index.php">Home</a></li>
				<li><a href="./journal_manager.php">Journal</a></li>
        <li><a href="./todo/todo.php">Tasks</a></li>
				<li><a href="./mood/index.php">Mood</a></li>
				<li><a href="./logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
  <div class="flex">
        <input type="text" class="grow-6">
        <button class="grow-1">Search</button>
        <select id="sort_mood" class="grow-1" oninput="sortDate()">
            <option value="date_descending">Sort by Date: Descending</option>
            <option value="date_ascending">Sort by Date: Ascending</option>
        </select>
        <select id="filter_mood" oninput="filterMood()">
            <option value="all">All Moods</option>
            <option value="mood_sad">Sad</option>
            <option value="mood_unhappy">Unhappy</option>
            <option value="mood_neutral">Neutral</option>
            <option value="mood_happy">Happy</option>
            <option value="mood_joyful">Joyfull</option>
        </select>
  </div>
  <div class="main-content">
    <a href="./add_journal.php" class="add-journal">Add Journal</a>
    <table id="journals">
      <tr>
          <th>Title</th>
          <th>Content</th>
          <th>View</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
    </table>
  </div>
  <section class="footer">
      <div class="copyright">
      <p>
        © 2024 by Iraya. All rights reserved.
      </p>
      </div>
    </section>
  <script src="./scripts/journal_manager.js"></script>
</body>
</html>