<?php

?>

<nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn mt-4 fixed-top" data-wow-delay="0.1s">
    <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="fw-bold text-secondary m-0">MKU<span class="text-primary">LIMA</span> MKUU</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <?php if (isset($_SESSION["rank"]) && $_SESSION["rank"] == "admin") :  ?>
            <div class="navbar-nav ms-auto p-4 p-lg-0 text-light">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="admin.php?page=user" class="nav-item nav-link">Users</a>
                <a href="admin.php?page=town" class="nav-item nav-link">City</a>
                <a href="admin.php?page=county" class="nav-item nav-link">Counties</a>
                <a href="admin.php?page=cats" class="nav-item nav-link">Categories</a>
                <?php if (!isset($_SESSION["uid"])) : ?>
                    <a href="login.php" class="nav-item nav-link">Log in</a>
                <?php else : ?>
                    <a href="engine/action.php?action=logout" class="nav-item nav-link">Log out</a>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <div class="navbar-nav ms-auto p-4 p-lg-0 text-light">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <?php if (isset($_SESSION["rank"])) : ?>
                    <?php if ($_SESSION["rank"] == "farmer") : ?>
                        <a href="farmer.php" class="nav-item nav-link">My products</a>
                        <a href="farmer.php" class="nav-item nav-link">Orders</a>
                    <?php endif; ?>
                    <?php if ($_SESSION["rank"] == "customer") : ?>
                        <a href="register.php" class="nav-item nav-link">Basket</a>
                        <a href="register.php" class="nav-item nav-link">Orders</a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (!isset($_SESSION["uid"])) : ?>
                    <a href="login.php" class="nav-item nav-link">Log in</a>
                    <a href="register.php" class="nav-item nav-link">Register</a>
                <?php else : ?>
                    <a href="engine/action.php?action=logout" class="nav-item nav-link">Log out</a>
                <?php endif; ?>
            </div>
        <?php
        endif; ?>
    </div>
</nav>