<?php
session_start();
require_once "../../engine/dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"] ?? "";
    $product_price = $_POST["product_price"] ?? "";
    $product_unit_type = $_POST["product_unit_type"] ?? "";
    $product_quantity = $_POST["product_quantity"] ?? "";
    $cat = $_POST["cat"];
    $stock = $_POST["stock"];
    $image = $_FILES['image'] ?? "";
    $image_path  = "";
    if (!is_dir('gallery')) {
        mkdir('gallery');
    }
    if ($image && $image['tmp_name']) {
        $image_path = 'gallery/' . bin2hex(random_bytes(8)) . '/' . $image['name'];
        mkdir(dirname($image_path));
        move_uploaded_file($image['tmp_name'], $image_path);
    }

    $statement = $pdo->prepare("INSERT INTO products
    (product_name,product_price,product_image,product_is_stocked,product_unit_type,product_quantity,product_category_id,product_sys_user_id)  
    VALUES
    (:product_name,:product_price,:product_image,:product_is_stocked,:product_unit_type,:product_quantity,:cat,:product_sys_user_id)");
    $statement->bindValue(":product_name", $product_name);
    $statement->bindValue(":product_price", $product_price);
    $statement->bindValue(":product_image", $image_path);
    $statement->bindValue(":product_is_stocked", $stock);
    $statement->bindValue(":product_unit_type", $product_unit_type);
    $statement->bindValue(":product_quantity", $product_quantity);
    $statement->bindValue(":cat", $cat);
    $statement->bindValue(":product_sys_user_id", $_SESSION["uid"]);
    $statement->execute();
}

header("Location: ../../farmer.php");
