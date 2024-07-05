<?php
require_once './config.php';

function registerUser($username, $password) {
    global $conn;
    $params = [$username, $password];

    $stmnt = $conn->execute_query("insert into users(username,password)
            values(?,?)", $params);
}

function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

function loginUser($username, $password) {
    global $conn;
    
    $user = getUser($username);

    if(!$user) {
        echo 'User with that username does not exist';
        exit;
    }

    if($user['password'] != $password) {
        echo "Invalid password.";
        exit;
    }

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['username'];
    header('Location:journal_manager.php');
}

function getUser($username) {
    global $conn;
    $params = [$username];

    $result = $conn->execute_query('select * from users where username=?',
        $params);
    return $result->fetch_assoc();
}

function addJournal($title, $content) {
    global $conn;
    $userId = $_SESSION['user_id'];

    $params = [$userId, $title, $content];

    $stmnt = $conn->execute_query("
        insert into journals (journal_id, user_id, journal_title, 
        journal_content) 
        select concat('j', lpad(max(index_id) + 1, 4, '0')), ?, ?, ? 
        from journals", $params);
    
    if ($stmnt) {
        echo "Journal entry added successfully!";
    } else {
        echo "Error adding journal entry: " . $conn->error;
    }
}

function updateJournal($journalId, $title, $content, $sticker) {
    global $conn;
    $params = [$title, $content, $sticker, $journalId];

    $stmnt = $conn->execute_query("update journals set journal_title=?
        ,journal_content=?,sticker_name=? where journal_id=?", $params);
}

function getJournal($journalId) {
    global $conn;
    $params = [$journalId];

    $result = $conn->execute_query("select * from journals where journal_id=?",
        $params);

    return $result;
}

function getAllJournals($userId) {
    global $conn;
    $params = [$userId];

    $result = $conn->execute_query("select * from journals where user_id=?",
        $params);

    return $result;
}

function deleteJournal($journalId) {
    echo $journalId;
    global $conn;
    $params = [$journalId];

    $result = $conn->execute_query("delete from journals where 
        journal_id=?", $params);

    echo $result;
}
?>