<?php
include_once "includes/header.php";
require_once "engine/dbh.inc.php";

$page = $_GET["page"];
?>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once "includes/nav.php" ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="container-fluid">
                    <?php if ($page == 'town') : ?>
                        <?php include_once "./page_assets/city/index.php" ?>
                    <?php elseif ($page == 'county') : ?>
                        <?php include_once "./page_assets/county/index.php" ?>
                    <?php elseif ($page == 'user') : ?>
                        <?php include_once "./page_assets/users/index.php" ?>
                    <?php elseif ($page == 'cats') : ?>
                        <?php include_once "./page_assets/categories/index.php" ?>
                    <?php endif ?>
                </div>
            </section>
        </div>

    </div>
    <?php require_once "includes/footer.php" ?>