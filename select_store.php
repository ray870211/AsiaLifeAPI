<?php
include("./connection.php");

$items = [];
$return_data = array(
    "store_data" =>  [],
);


$sql = "SELECT * FROM store";
$query = mysqli_query($connection, $sql);
while ($item = mysqli_fetch_assoc($query)) {
    $items[] = $item;
}

for ($i = 0; $i < count($items); $i++) {
    $image = '';
    $file = $items[$i]['image'];
    // echo $file;
    $fp = fopen($file, 'r');
    if (file_exists($file)) {
        while (!feof($fp)) {
            $image = $image . fgetc($fp);
        }
        fclose($fp);
    }
    $base64 = (base64_encode($image));
    // echo $base64 . "</br>";
    // var_dump($items);
    $data = array(
        "id" => $items[$i]['id'],
        "name" => $items[$i]['name'],
        "image" => $base64,
        "address" => $items[$i]['address'],
        "phone" => $items[$i]['phone']
    );

    array_push($return_data["store_data"], $data);
}

echo json_encode($return_data);
