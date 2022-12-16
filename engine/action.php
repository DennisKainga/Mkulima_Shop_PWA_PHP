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
if ($action == "remove") {
    $id = $_GET["cid"];
    unset($_SESSION['cart'][$id]);
    header("Location: ../index.php?mess=item_removed");
}
if ($action == "checkout") {
    $items = $_SESSION['cart'] ?? [];
    if (sizeof($items) > 0) {
        $statement = $pdo->prepare(
            "INSERT INTO product_order
            (product_order_qty,product_order_date,product_order_sys_user_id,product_order_product_id)
            VALUES(:qty,:odate,:uid,:prod)"
        );

        foreach ($items as $item) {
            $statement->bindValue(":qty", $item['qty']);
            $statement->bindValue(":odate",  date("Y-m-d"));
            $statement->bindValue(":uid", $_SESSION["uid"]);
            $statement->bindValue(":prod", $item['id']);
            $statement->execute();
        }
        header("Location: ../index.php?mess=itemaddedtocart");
    } else {
        header("Location: ../index.php?mess=noitemsincart");
    }
}
