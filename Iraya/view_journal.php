<?php session_start();
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
</head>

<body>
    <button type="button">Back</button>
    <div>
        <label for="journal_title">Title</label>
        <div id="journal_title"><?= $row['journal_title'] ?></div>
        <div>
            <label for="journal_content">Content</label>
            <div id="journal_content"><?= $row['journal_content'] ?></div>
        </div>
        <script src="./scripts/view_journal.js"></script>
    </div>
</body>

</html>