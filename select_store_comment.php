<?php
include("./connection.php");
$comment_data = array(
    "comment_data" => [],
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
}

$sql = "SELECT
store_comment.id,
store_comment.store_id,
store_comment.score,
store_comment.`comment`,
store_comment.create_time,
store_comment.user_id,
`user`.`name`,
`user`.`image`
FROM
store_comment
INNER JOIN `user` ON store_comment.user_id = `user`.id
WHERE
store_comment.store_id = $id
";
$query = mysqli_query($connection, $sql);
if ($query != false) {
    while ($item = mysqli_fetch_assoc($query)) {
        $items[] = $item;
    }
    if (count($items) == 0) {
        $data = array(
            "status_code" => "404",
            "id" => "null",
            "name" => "null",
            "comment" => "null",
            "create_time" => "null",
            "score" =>  "null",
            "author_image" => "null",
        );
        array_push($comment_data["comment_data"], $data);
    } else {
        for ($i = 0; $i < count($items); $i++) {

            $data = array(
                "status_code" => "200",
                "id" => $items[$i]['id'],
                "name" => $items[$i]['name'],
                "comment" => $items[$i]['comment'],
                "create_time" => $items[$i]['create_time'],
                "score" =>  $items[$i]['score'],
                "author_image" => $items[$i]['image']
            );
            array_push($comment_data["comment_data"], $data);
        }
    }
} else {
    $data = array(
        "status_code" => "404",
        "id" => "null",
        "name" => "null",
        "comment" => "null",
        "create_time" => "null",
        "score" =>  "null",
        "author_image" => "null",
    );
    array_push($comment_data["comment_data"], $data);
}

echo json_encode($comment_data);

// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
