<?php
include("./connection.php");
$post_data = array(
    "comment_data" => [],
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
}

$sql = "SELECT
`comment`.id,
`comment`.author,
`comment`.create_time,
`comment`.post_id,
`comment`.content,
`comment`.score
FROM
`comment`
INNER JOIN post ON `comment`.post_id = $id AND `comment`.post_id = post.id

";
$query = mysqli_query($connection, $sql);
while ($items = mysqli_fetch_assoc($query)) {
    // var_dump($items);
    $data = array(
        "id" => $items['id'],
        "author" => $items['author'],
        "content" => $items['content'],
        "create_time" => $items['create_time'],
        "score" =>  $items['score'],
    );
    array_push($post_data["comment_data"], $data);
}
echo json_encode($post_data);

// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
