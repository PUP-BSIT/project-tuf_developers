<?php
require_once './config.php';

function registerUser($username, $password) {
    global $conn;
    $params = [$username, $password];

    $user = getUser($username);
    if($user) {
        $message = "Account already exists";
        header("Location:register.php?message=$message");
        return;
    }

    $conn->execute_query("
        insert into users(user_id,username,password)
        values(?, ?, ?)", $params);

    $user = getUser($username);

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['username'];
    
    $message = 'Registered Successfully!';
   
    header("Location:generate_code.php?message=$message");
}

function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

function loginUser($username, $password) {
    global $conn;
    
    $user = getUser($username);

    if(!$user) {
        $message = 'User with that username does not exist';
        header("Location:login.php?message=$message");
        return;
    }

    if($user['password'] != $password) {
        $message = 'Password is incorrect';
        header("Location:login.php?message=$message");
        return;
    }

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['username'];
    header("Location:dashboard.php?remind={$user['username']}");
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
        insert into journals (user_id, journal_title, journal_content) 
        values(?, ?, ?)", $params);
    
    if ($stmnt) {
        echo "Journal entry added successfully!";
    } else {
        echo "Error adding journal entry: " . $conn->error;
    }
}

function updateJournal($journalId, $title, $content) {
    global $conn;
    $params = [$title, $content, $journalId];

    $stmnt = $conn->execute_query("update journals set journal_title=?
        ,journal_content=? where journal_id=?", $params);
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