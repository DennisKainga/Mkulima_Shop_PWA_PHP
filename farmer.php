<?php
require_once "engine/dbh.inc.php";
include_once "includes/header.php";
$statement = $pdo->prepare("SELECT * FROM category");
$statement->execute();
$cats = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_unit_type = $_POST["product_unit_type"];
    $product_quantity = $_POST["product_quantity"];
    $cat = $_POST["cat"];
    $stock = $_POST["stock"];
    $image = $_FILES['image'] ?? null;
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

?>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once "includes/nav.php" ?>
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php include "page_assets/products/index.php" ?>
            </section>
        </div>
    </div>
    <?php require_once "includes/footer.php" ?>