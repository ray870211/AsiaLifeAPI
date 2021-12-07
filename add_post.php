<?php
include("./connection.php");
$time = date('Y-m-d H:i:s');
$return_data = array(
    "status_code" =>  "200",
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST["title"];
    $class = $_POST['class'];
    $user = $_POST['user'];
    $content = $_POST['content'];
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $title = $_GET["title"];
    $class = $_GET['class'];
    $user = $_GET['user'];
    $content = $_GET['content'];
}
$class = intval($class);

$post_sql = "INSERT INTO post VALUES(null,'$title','$user','$content',$class,'$time')";
$query = mysqli_query($connection, $post_sql);
$insert_id = mysqli_insert_id($connection);
$add_comment_sql = "INSERT INTO comment VALUES(null,'$user','$content','$time',$insert_id,0)";
$query = mysqli_query($connection, $add_comment_sql);
if ($query != false) {
    echo json_encode($return_data);
} else {
    $return_data["status_code"] = 404;
    echo json_encode($return_data);
}
// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
