<?php
include("./connection.php");
$items = [];
$tables = array(
    "Account" =>  [],
    "Employee" => [],
    "Record" => [],
);
$account_sql = "SELECT
`user`.id,
`user`.`name`,
`user`.u_id,
`user`.class,
`user`.email,
`user`.`password`,
`user`.gender
FROM
`user`";
$account_query = mysqli_query($connection, $account_sql);
while ($item = mysqli_fetch_assoc($account_query)) {
    array_push($tables['Account'], $item);
}
$employee_sql = "SELECT
post.id,
post.title,
post.author,
post.content,
post.create_time,
post.user_id
FROM
post
";
$employee_query = mysqli_query($connection, $employee_sql);
while ($item = mysqli_fetch_assoc($employee_query)) {
    array_push($tables['Employee'], $item);
}
$record_sql = "SELECT
store.id,
store.`name`,
store.address,
store.phone
FROM
store";
$record_query = mysqli_query($connection, $record_sql);
while ($item = mysqli_fetch_assoc($record_query)) {
    array_push($tables['Record'], $item);
}
echo json_encode($tables);
