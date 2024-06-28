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
    <title>View Journal</title>
    <link rel="stylesheet" href="./assets/stylesheets/view_journal.css" />
</head>

    <body>
        <header>
        <div class="logo-container">
            <img src="./assets/images/logo.png" 
                alt="Iraya Logo" 
                class="logo" />
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
                <li>
                <a href="#" class="get-started-btn">
                    Get Started</a>
                </li>
            </ul>
        </nav>
        </header>

        <button type="button" class="back-btn">Back</button>
        <div>
            <div class="title-journal">
                <label for="journal_title">Title</label>
            </div>
            <div id="journal_title"><?= $row['journal_title'] ?></div>
            <div class="journal-content">
                <label for="journal_content">Content</label>
                <div id="journal_content"><?= $row['journal_content'] ?></div>
            </div>
            <img id="sticker">
            <script src="./scripts/view_journal.js"></script>
        </div>
        <section class="footer">
            <p class="copyright">© 2024 by Iraya. All rights reserved. </p>
        </section>
    </body>

</html>