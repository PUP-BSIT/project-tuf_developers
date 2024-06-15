<?php
session_start();
require_once './user.php';

if (!isUserLoggedIn()) {
    die('{ "error": "Invalid Access!" }');
}