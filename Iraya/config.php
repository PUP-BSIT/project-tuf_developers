<?php
    $username = 'root';
    $password = '';
    $servername = 'localhost';
    $database = 'iraya';

    $conn = new mysqli($servername,$username,$password,$database);

    if(!$conn) {
        echo 'Connection not found!';
    }
?>