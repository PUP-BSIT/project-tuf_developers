<?php 
session_start();
require_once '../user.php';

if (!isUserLoggedIn()) {
    echo '{ "error": "Invalid Access!" }';
}
else {
    $userId = $_SESSION['user_id'];
    $journals = getAllJournals($userId);
    $result = $journals->fetch_all();
    $json = json_encode($result);
    echo $json;
}
?>