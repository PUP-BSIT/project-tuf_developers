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
  <title>Document</title>
</head>
<body>
  <a href="./add_journal.php">Add Journal</a>
  <a href="./logout.php">Logout</a>
    <table id="journals">
    <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
  </table>
  <script src="./scripts/journal_manager.js"></script>
</body>
</html>