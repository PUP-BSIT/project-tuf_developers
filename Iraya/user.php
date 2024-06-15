<?php
require_once './config.php';

function registerUser($username, $password) {
    global $conn;
    $params = [$username, $password];

    $stmnt = $conn->execute_query("insert into user(username,password)
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

    $result = $conn->execute_query('select * from user where username=?',
        $params);
    return $result->fetch_assoc();
}
?>