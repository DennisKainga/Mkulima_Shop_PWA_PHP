<?php
require_once "../../engine/dbh.inc.php";
$order_id = $_POST["order_id"];
// $prod_id = $_POST["prod_id"];
$uid = $_POST["uid"];
$date = $_POST["date"];
$time = $_POST["time"];
$town = $_POST["town"];

$statement = $pdo->prepare(
    "INSERT INTO pickup_point(
     pickup_point_date,
     pickup_point_time,
     pickup_point_town_id,
     pickup_point_product_order_id,
     pickup_point_sys_user_id
     )
     VALUES
     (:date,:time,:town,:oid,:uid)"
);
$statement->bindValue(":date", $date);
$statement->bindValue(":time", $time);
$statement->bindValue(":town", $town);
$statement->bindValue(":oid", $order_id);
$statement->bindValue(":uid", $uid);
$statement->execute();

$statement = $pdo->prepare("UPDATE product_order SET product_order_status=1 WHERE product_order_id=:id");
$statement->bindValue(":id", $order_id);
$statement->execute();


header("Location: ../../farmer.php?page=order");
