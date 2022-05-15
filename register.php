<?php
include("./connection.php");
$return_data = array(
    "status_code" =>  "200",
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $u_id = $_POST['u_id'];
    $myclass = $_POST['class'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $image = preg_replace('#data:image/[^;]+;base64,#', '', $_POST['image']);
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user = $_GET['user'];
    $content = $_GET['content'];
    $post_id = $_GET['post_id'];
}

$sql = "INSERT INTO user VALUES(null,'$name',$u_id,'$myclass','$email','$password','$gender','$image')";
$query = mysqli_query($connection, $sql);
if ($query != false) {
    echo json_encode($return_data);
} else {
    $return_data["status_code"] = "404";
    echo json_encode($return_data);
}
