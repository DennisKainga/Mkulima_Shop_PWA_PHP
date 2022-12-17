<?php
require_once "../../engine/dbh.inc.php";
$oid = $_POST["oid"];
$amount = $_POST["amount"];
$ref = $_POST["ref"];

$statement = $pdo->prepare("INSERT INTO
 payment(payment_amount_transacted,payment_ref_number,payment_date,payment_product_order_id)
 VALUES
 (:amount,:ref,:date,:oid)
 ");

$statement->bindValue(":amount", $amount);
$statement->bindValue(":ref", $ref);
$statement->bindValue(":date", date('Y-m-d'));
$statement->bindValue(":oid", $oid);
$statement->execute();



$statement = $pdo->prepare("UPDATE product_order SET product_order_status=2 WHERE product_order_id=:id");
$statement->bindValue(":id", $oid);
$statement->execute();
header("Location: ../../farmer.php?page=order");
