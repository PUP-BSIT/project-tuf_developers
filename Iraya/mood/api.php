<?php
session_start();
require_once '../config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = $conn->execute_query('select * from moods where user_id=?',
        [$_SESSION['user_id']]);
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
        insert into moods(mood_id, user_id, mood_status, mood_description)
        select concat('m-', lpad(max(index_id) + 1, 4, '0')), ?, ?, ?
        from moods",[$_SESSION['user_id'], $status, $description]);
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    $id = $_DELETE['mood_id'];
    $conn->execute_query('delete from moods where mood_id=?',[$id]);
}
?>