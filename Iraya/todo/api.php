<?php
session_start();
require_once '../config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = $conn->execute_query('select * from tasks where user_id=?',
        [$_SESSION['user_id']]);
    $data = [];
    while($row = $response->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}
else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST = json_decode(file_get_contents('php://input'),true);

    $todo = $_POST['todo'];
    $in_progress = $_POST['in_progress'];
    $completed = $_POST['completed'];

    $conn->execute_query("
        insert into tasks(task_id, user_id, todo, in_progress, completed)
        select concat('t-', lpad(max(index_id) + 1, 4, '0')), ?, ?, ?, ?
        from moods", [$_SESSION['user_id'], $todo, $in_progress, $completed]);
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);

    $id = $_DELETE['task_id'];
    $conn->execute_query('delete from tasks where task_id=?',[$id]);
}
?>