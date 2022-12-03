<?php
require_once "../../engine/dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $unit_type = $_POST["unit_type"];
    $qty = $_POST["qty"];
    $cat = $_POST["cat"];
    $id = $_POST["product_id"];


    $statement = $pdo->prepare(
        "UPDATE products SET 
                            product_name=:name,
                            product_price=:price,
                            product_is_stocked=:stock,
                            product_unit_type=:unit_type,
                            product_quantity=:qty,
                            product_category_id=:cat WHERE product_id=:id"
    );

    $statement->bindValue(":name", $name);
    $statement->bindValue(":price", $price);
    $statement->bindValue(":stock", $stock);
    $statement->bindValue(":unit_type", $unit_type);
    $statement->bindValue(":qty", $qty);
    $statement->bindValue(":cat", $cat);
    $statement->bindValue(":id", $id);
    $statement->execute();
    header("Location: ../../farmer.php");
}
