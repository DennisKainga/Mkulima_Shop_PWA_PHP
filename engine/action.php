<?php
session_start();
$action = $_GET["action"];
include_once "./dbh.inc.php";
if ($action == "logout") {
    session_destroy();
    header("Location: ../index.php");
}
if ($action == "del") {
    $statement = $pdo->prepare("DELETE FROM products WHERE product_id=:id");
    $statement->bindValue(":id", $_GET["id"]);
    $statement->execute();
    header("Location: ../farmer.php");
}

if ($action == "user_del") {
    $statement = $pdo->prepare("DELETE FROM login WHERE login_id=:id");
    $statement->bindValue(":id", $_GET["id"]);
    $statement->execute();
    header("Location: ../admin.php?page=user");
}

if ($action == "county_del") {
    $statement = $pdo->prepare("DELETE FROM county WHERE county_id=:id");
    $statement->bindValue(":id", $_GET["id"]);
    $statement->execute();
    header("Location: ../admin.php?page=county");
}
