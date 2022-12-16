<?php
require_once "engine/dbh.inc.php";
include_once "includes/header.php";
$statement = $pdo->prepare("SELECT * FROM category");
$statement->execute();
$cats = $statement->fetchAll(PDO::FETCH_ASSOC);
$page = $_GET['page'];
?>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once "includes/nav.php" ?>
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php if ($page == "cart") : { ?>
                            <?php include "page_assets/cart/index.php" ?>
                    <?php }
                    endif ?>
            </section>
        </div>
    </div>
    <?php require_once "includes/footer.php" ?>