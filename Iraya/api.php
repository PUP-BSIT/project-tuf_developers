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

    addJournal($journalTitle, $journalContent);
}
else if($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    parse_str(file_get_contents('php://input'), $_PATCH);
    $journalId = $_PATCH['journal_id'];
    $title = $_PATCH['journal_title'];
    $content = $_PATCH['journal_content'];

    updateJournal($journalId, $title, $content);
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);
    $journalId = $_DELETE['journal_id'];

    deleteJournal($journalId);
}
?>