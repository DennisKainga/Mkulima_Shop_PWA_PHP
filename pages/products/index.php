<?php
$stmt = $pdo->prepare('SELECT * FROM products WHERE product_sys_user_id=:id');
$stmt->bindValue(":id", $_SESSION["uid"]);

$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container-xxl py-5" id="app">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">My Products</h1>
                    <p>Edit/Create Products</p>
                </div>
            </div>

        </div>
        <div class="tab-content">


            <div id="tab-1" class="tab-pane fade show p-0 active">

                <div class="row g-4">
                    <?php foreach ($products as $product) : { ?>

                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="<?php echo $product["product_image"] ?>" alt="">
                                        <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href=""><?php echo $product["product_name"] ?></a>
                                        <span class="text-primary me-1">ksh<?php echo $product["product_price"] ?></span>
                                        <span class="text-body text-decoration-line-through">ksh1000</span>
                                    </div>

                                    <div class="d-flex border-top">

                                        <a class="btn btn-primary w-50 mx-2" data-bs-toggle="modal" data-bs-target="#updatemodal<?php echo $product["product_id"] ?>">Edit</a>

                                        <small class="w-50 text-center py-2 bg-danger text-light">
                                            <a class="text-light" href="engine/action.php?action=del&id=<?php echo $product["product_id"] ?>">Delete</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php include "update_modal.php" ?>
                    <?php }
                    endforeach; ?>
                </div>
            </div>
            <div class="col-12 text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
                <a class="btn btn-primary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#createmodal" href="">Create New Product</a>
            </div>
            <?php include_once "create_modal.php" ?>
            <!-- End of Tab 1 -->
        </div>
    </div>
</div>