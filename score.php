<?php
include("./connection.php");
$time = date('Y-m-d H:i:s');
$return_data = array(
    "status_code" =>  "404",
    "score" => $score,
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $is_add = $_POST['is_add'];
}

$class = intval($class);
if ($is_add == 1) {
    $score_sql = "UPDATE comment set score = score+1 where id=$id";
} else {
    $score_sql = "UPDATE comment set score = score-1 where id=$id";
}

$query = mysqli_query($connection, $score_sql);
if ($query != false) {
    $return_score_sql = "SELECT score from comment where id = $id";
    $return_score_query = mysqli_query($connection, $return_score_sql);
    while ($item = mysqli_fetch_assoc($return_score_query)) {
        $items[] = $item;
    }
    if (isset($items[0]['score'])) {
        $return_data['score'] = $items[0]['score'];
        $return_data["status_code"] = "200";
        echo json_encode($return_data);
    } else {
        echo json_encode($return_data);
    }
} else {
    echo json_encode($return_data);
}
// $comment_sql = "INSERT INTO comment VALUES(null,$user,$content)";
