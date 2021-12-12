<?php
include("./connection.php");
$time = date('Y-m-d H:i:s');
$return_data = array(
    "status_code" =>  "200",
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $content = $_POST['content'];
    $post_id = $_POST['post_id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user = $_GET['user'];
    $content = $_GET['content'];
    $post_id = $_GET['post_id'];
}
$class = intval($class);

$post_sql = "INSERT INTO comment VALUES(null,'$user','$content','$time',$post_id,0)";
$query = mysqli_query($connection, $post_sql);
if ($query != false) {
    echo json_encode($return_data);
} else {
    $return_data["status_code"] = "404";
    echo json_encode($return_data);
}
// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
