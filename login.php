<?php
include("./connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_GET["email"];
    $password = $_GET["password"];
}

$sql = "SELECT * FROM user WHERE email = '$email'";
$query = mysqli_query($connection, $sql);
while ($item = mysqli_fetch_assoc($query))
    // var_dump($item);
    if ($item['password'] == $password) {
        $data = array(
            "status_code" => "200",
            "id" => $item['id'],
            "name" => $item['name'],
            "user_class" => $item['class'],
            "u_id" => $item['u_id'],
            "email" => $item['email'],
            "password" => $item['password'],
            "image" => $item['image']
        );
    } else {
        $data = array(
            "status_code" => "404",
            "message" => "error"
        );
    }
// var_dump($item);
echo json_encode($data);
