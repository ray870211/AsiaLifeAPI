<?php
include("./connection.php");
$time = date('Y-m-d H:i:s');
$return_data = array(
    "status_code" =>  "200",
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $store_id = $_POST['store_id'];
    $user_id = $_POST['user_id'];
}
// var_dump($_POST);
// INSERT INTO `store_comment` (`id`, `store_id`, `comment`, `create_time`, `user_id`) VALUES ('3', '1', 'nice', '2021-12-15 10:31:05', '9')
$store_sql = "INSERT INTO `store_comment` (`id`, `store_id`, `comment`, `create_time`, `user_id`) VALUES (null, $store_id, '$content', '$time', '$user_id')
";
$query = mysqli_query($connection, $store_sql);
if ($query != false) {
    echo json_encode($return_data);
} else {
    $return_data["status_code"] = "404";
    echo json_encode($return_data);
}
// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
