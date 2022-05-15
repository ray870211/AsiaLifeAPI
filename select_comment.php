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
`comment`.content,
`comment`.create_time,
`comment`.post_id,
`comment`.score,
`comment`.author_id,
`user`.image
FROM
`comment`
INNER JOIN post ON `comment`.post_id = $id AND `comment`.post_id = post.id
INNER JOIN `user` ON `comment`.author_id = `user`.id
-- ORDER BY `comment`.score DESC
";
$query = mysqli_query($connection, $sql);
if ($query != false) {
    while ($items = mysqli_fetch_assoc($query)) {
        // var_dump($items);
        $data = array(
            "id" => $items['id'],
            "author" => $items['author'],
            "content" => $items['content'],
            "create_time" => $items['create_time'],
            "score" =>  $items['score'],
            "author_image" => $items['image']
        );
        array_push($post_data["comment_data"], $data);
    }
}

echo json_encode($post_data);

// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
