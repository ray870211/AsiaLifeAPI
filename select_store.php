<?php
include("./connection.php");

ini_set('display_errors', '1');
error_reporting(E_ALL);
$items = [];
$return_data = array(
    "store_data" =>  [],
);
$image = '';

$sql = "SELECT * FROM store";
$query = mysqli_query($connection, $sql);
while ($item = mysqli_fetch_assoc($query)) {
    $items[] = $item;
}

for ($i = 0; $i < count($items); $i++) {
    $file = $items[$i]['image'];
    $fp = fopen($file, 'r');
    if (file_exists($file)) {
        while (!feof($fp)) {
            $image = $image . fgetc($fp);
        }
        fclose($fp);
    }
    $base64 = chunk_split(base64_encode($image));
    // var_dump($items);
    $data = array(
        "id" => $items[$i]['id'],
        "name" => $items[$i]['name'],
        "image" => $base64,
    );

    array_push($return_data["store_data"], $data);
}

echo json_encode($return_data);
