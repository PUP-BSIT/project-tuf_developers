<?php 
session_start();
require_once '../user.php';

if (!isUserLoggedIn()) {
    echo '{ "error": "Invalid Access!" }';
}
else {
    $userId = $_SESSION['user_id'];
    $journalId = $_POST['journal_id'];

    deleteJournal($journalId);
}
?>