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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Journal</title>
</head>
<body>
    <button type="button">Back</button>
    <form>
        <div>
            <label for="journal_title">Title</label>
            <input type="text" name="journal_title" id="journal_title"
                required>
        </div>
        <div>
            <label for="journal_content">Content</label>
            <textarea name="journal_content"
                id="journal_content" required></textarea>
        </div>
        <button type="button" onclick="insertJournal()">Add Journal</button>
    </form>
    <script src="./scripts/add_journal.js"></script>
</body>
</html>