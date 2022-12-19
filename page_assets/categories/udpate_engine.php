<?php
require_once "../../engine/dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'];
    $category_name = $_POST["category_name"];
    $category_desc = $_POST["category_desc"];
    $statement = $pdo->prepare("UPDATE category SET category_name=:name,category_description=:cat_desc WHERE category_id=:id");
    $statement->bindValue(":name", $category_name);
    $statement->bindValue(":cat_desc", $category_desc);
    $statement->bindvalue(":id", $category_id);
    $statement->execute();
    header("Location: ../../admin.php?page=cats");
}
