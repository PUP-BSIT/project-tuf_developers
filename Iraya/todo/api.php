<?php
session_start();
require_once '../config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $taskId = $_GET['task_id'] ?? '';
    if($taskId) {
        $response = $conn->execute_query('select * from tasks where user_id=? 
            AND task_id=?',[$_SESSION['user_id'], $taskId]);
        $data = $response->fetch_assoc();
        echo json_encode($data);
        return;
    }

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
    $conn->execute_query("
        insert into tasks(task_id, user_id)
        select concat('m-', lpad(coalesce(max(index_id),0) + 1, 4, '0')), ?
        from tasks", [$_SESSION['user_id']]);

    $response = $conn->query('select max(task_id) from tasks');
    $data = $response->fetch_assoc();
    echo json_encode(["task_id" => $data['max(task_id)']]);
}
else if($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    $_PATCH = json_decode(file_get_contents('php://input'),true);

    $id = $_PATCH['id'];
    $title = $_PATCH['title'];
    $todo = json_encode($_PATCH['todo']);
    $in_progress = json_encode($_PATCH['progress']);
    $completed = json_encode($_PATCH['completed']);

    $conn->execute_query("
        update tasks set title=?, todo=?, in_progress=?, completed=? 
        where user_id=? AND task_id=?", 
        [$title, $todo, $in_progress, $completed, $_SESSION['user_id'], $id]);
}
else if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $_DELETE = json_decode(file_get_contents('php://input'),true);

    $id = $_DELETE['task_id'];
    $conn->execute_query('delete from tasks where task_id=?',[$id]);
}
?>