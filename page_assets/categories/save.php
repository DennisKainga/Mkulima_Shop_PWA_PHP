<?php
require_once "../../engine/dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST["category_name"];
    $category_desc = $_POST["category_desc"];

    $statement = $pdo->prepare("INSERT INTO category(category_name,category_description)
    VALUES(:name,:cat_desc)");
    $statement->bindValue(":name", $category_name);
    $statement->bindValue(":cat_desc", $category_desc);
    $statement->execute();
    header("Location: ../../admin.php?page=cats");
}
