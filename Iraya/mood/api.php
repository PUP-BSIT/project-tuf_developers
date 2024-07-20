<?php
session_start();
require_once '../config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $type = $_GET['type'] ?? '';
    $response = '';

    if($type == 'week') {
        $response = $conn->execute_query('select * from moods 
            where week(datetime_created) = week(now()) and user_id=?',
        [$_SESSION['user_id']]);
    } else {
        $response = $conn->execute_query('select * from moods where user_id=?',
            [$_SESSION['user_id']]);
    }

    $data = [];
    while($row = $response->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}
else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST = json_decode(file_get_contents('php://input'),true);

    $status = $_POST['mood_status'];
    $description = $_POST['mood_description'];

    $conn->execute_query("
        insert into moods(user_id, mood_status, mood_description)
        values(?, ?, ?, ?)",[$_SESSION['user_id'], $status, $description]);
}
else if($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    $_PATCH = json_decode(file_get_contents('php://input'),true);

    $id = $_PATCH['id'];
    $status = $_PATCH['status'];
    $description = $_PATCH['description'];

    $conn->execute_query('update moods set mood_status=?, mood_description=?
        where mood_id=?',
        [$status, $description, $id]);
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    $id = $_DELETE['mood_id'];
    $conn->execute_query('delete from moods where mood_id=?',[$id]);
}
?>