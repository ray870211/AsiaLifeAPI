<?php
include("./connection.php");
$return_data = array(
    "post_data" =>  [],
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
}
$select_sql = "SELECT * FROM post";
$query = mysqli_query($connection, $select_sql);
while ($item = mysqli_fetch_assoc($query)) {
    $items[] = $item;
}
for ($i = 0; $i < count($items); $i++) {
    $data = array(
        "post_id" => $items[$i]['id'],
        "post_class" => $items[$i]['class'],
        "post_title" => $items[$i]['title'],
        "post_content" => $items[$i]['content'],
        "post_create_time" => $items[$i]['create_time']
    );
    array_push($return_data["post_data"], $data);
}

echo json_encode($return_data);
//回傳所有文章的資料
// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
