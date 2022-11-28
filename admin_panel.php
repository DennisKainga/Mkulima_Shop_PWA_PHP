<?php
require_once "engine/dbh.inc.php";
include_once "includes/header.php";
$statement = $pdo->prepare("SELECT town.town_name,county.county_name,login.*,sys_user.*  FROM sys_user
 INNER JOIN login ON login.login_id=sys_user.sys_user_login_id
 INNER JOIN town ON town.town_id=sys_user.sys_user_town_id
 INNER JOIN county ON county.county_id=town.town_id");
$statement->execute();
$sys_users = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT town.town_id,town.town_name,county.county_name FROM town 
INNER JOIN county ON county.county_id=town.town_county_id");
$statement->execute();
$towns = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<style>
    body {
        background-color: #eee
    }

    .card {
        border: none;
        border-radius: 10px
    }

    .c-details span {
        font-weight: 300;
        font-size: 13px
    }

    .icon {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
    }

    .badge span {
        background-color: #fffbec;
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: green;
        justify-content: center;
        align-items: center
    }

    .progress {
        height: 10px;
        border-radius: 10px
    }

    .progress div {
        background-color: red
    }

    .text1 {
        font-size: 14px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }
</style>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once "includes/nav.php" ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="container-fluid">
                    <div class="container-xxl py-5" id="app">
                        <div class="container">
                            <div class="row g-0 gx-5 align-items-end">
                                <div class="mt-5 col-lg-6">
                                    <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                                        <h1 class="display-5 mb-3">Users</h1>
                                        <p>Edit/Create Users</p>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="col-12 text-center wow fadeInUp mt-5 sticky-lg-top" data-wow-delay="0.1s">
                                    <a class="btn btn-primary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#usercreatemodal" href="">Create New User</a>
                                </div>
                                <?php include_once "user_create_modal.php" ?>
                                <div class="container mt-5 mb-3">

                                    <div class="row">
                                        <?php foreach ($sys_users as $sys_user) : { ?>
                                                <div class="col-md-4">
                                                    <div class="card p-3 mb-3 bg-white">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div class="icon d-flex flex-row align-items-center"> <i class="fa fa-user me-3"></i></i> </div>
                                                                <div class="ms-2 c-details">
                                                                    <h6 class="mb-0"><?php echo $sys_user["sys_user_first_name"] . ' ' . $sys_user["sys_user_last_name"] ?></h6> <span>1 day (s) ago</span>
                                                                </div>
                                                            </div>
                                                            <div class="badge text-dark"> <span></span> </div>
                                                        </div>
                                                        <div class="mt-5">

                                                            <p class="heading"><?php echo '<i class="fa fa-user text-secondary me-3"></i>' . ucwords($sys_user["login_rank"]) ?></p>
                                                            <p class="heading"><?php echo '<i class="fa fa-phone text-secondary me-3"></i>' . $sys_user["sys_user_mobile"] ?></p>
                                                            <p class="heading"><?php echo '<i class="fa fa-map-marker text-primary me-3"></i>' . $sys_user["county_name"] . ', ' . $sys_user["town_name"] ?></p>
                                                            <div class="mt-5 d-flex">
                                                                <a class="btn btn-primary w-50 mx-2" data-bs-toggle="modal" data-bs-target="#updatemodal<?php echo $product["product_id"] ?>">Edit</a>
                                                                <a class="btn btn-danger w-50 mx-2" href="engine/action.php?action=user_del&id=<?php echo $sys_user["login_id"] ?>">Delete</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        endforeach; ?>

                                    </div>
                                </div>

                                <!-- End of Tab 1 -->
                            </div>
                        </div>
                    </div>
                    <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

    </div>
    <?php require_once "includes/footer.php" ?>