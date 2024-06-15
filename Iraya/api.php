<?php
session_start();
require_once './user.php';

if (!isUserLoggedIn()) {
    die('{ "error": "Invalid Access!" }');
}

$userId = $_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $journals = getAllJournals($userId);
    $result = $journals->fetch_all();
    $json = json_encode($result);

    echo $json;
}
else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $journalTitle = $_POST['journal_title'];
    $journalContent = $_POST['journal_content'];
    $sticker = 'none';

    addJournal($journalTitle, $journalContent);
}