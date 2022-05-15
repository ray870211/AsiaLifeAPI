<?php
include("./connection.php");
$return_data = array(
    "discount_data" =>  [],
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
}
$select_sql = "SELECT * from discount where store_id = $id
";
$query = mysqli_query($connection, $select_sql);
if ($query != false) {
    while ($item = mysqli_fetch_assoc($query)) {
        $items[] = $item;
    }
    if (count($items) == 0) {
        $data = array(
            "status_code" => "404",
            "discount_id" => "null",
            "discount_name" => "null",
        );
        array_push($return_data["discount_data"], $data);
    }
    for ($i = 0; $i < count($items); $i++) {
        $data = array(
            "status_code" => "200",
            "discount_id" => $items[$i]['id'],
            "discount_name" => $items[$i]['discount_name'],
        );
        array_push($return_data["discount_data"], $data);
    }

    echo json_encode($return_data);
} else {
    $data = array(
        "status_code" => "404",
        "discount_id" => "null",
        "discount_name" => "null",
    );
    array_push($return_data["discount_data"], $data);
}

//回傳所有文章的資料
// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
