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
?>