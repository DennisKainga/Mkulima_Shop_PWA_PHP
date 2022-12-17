<?php

if ($_SESSION["rank"] == "customer") {
    $btn_text = "pending";
    $order_text = "These are your orders";
    $stmt = $pdo->prepare('SELECT products.*,product_order.*
    FROM products
    INNER JOIN product_order
    ON products.product_id=product_order.product_order_product_id 
    WHERE product_order_sys_user_id=:id');
}
if ($_SESSION["rank"] == "farmer") {
    $btn_text = "Approve";
    $order_text = "These are orders made by your customers";
    $stmt = $pdo->prepare("SELECT products.*,product_order.* FROM products INNER JOIN product_order
    ON products.product_id=product_order.product_order_product_id
    WHERE product_sys_user_id=:id");
}

$stmt->bindValue(":id", $_SESSION["uid"]);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($products);
// echo '<pre>';
// exit;
?>

<div class="container-xxl py-5" id="app">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Orders</h1>
                    <p><?php echo $order_text ?></p>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">

                <div class="row g-4">
                    <?php foreach ($products as $product) : { ?>
                            <?php include "order-meetup.php" ?>
                            <?php include "order-info.php" ?>
                            <?php include "order-payment.php" ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="page_assets/products/<?php echo $product["product_image"] ?>" alt="">
                                        <!-- <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div> -->
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href=""><?php echo $product["product_name"] ?></a>
                                        <span class="text-primary me-1"><?php echo "Qauntity: " . $product["product_order_qty"] ?></span><br>
                                        <!-- <span class="text-secondary me-1"><?php echo "Location: " . $product["product_order_qty"] ?></span> -->
                                        <!-- <span class="text-body text-decoration-line-through">ksh1000</span> -->
                                    </div>

                                    <?php
                                    if ($product["product_order_status"] == "0") {
                                        $farmer_text1 = "info";
                                        $farmer_text2 = "Payment";
                                        $customer_text = "pending";
                                        $disabled = "";
                                        $color = "danger";
                                    }
                                    if ($product["product_order_status"] == "1") {
                                        $farmer_text1 = "info";
                                        $farmer_text2 = "Payment";
                                        $customer_text = "View info";
                                        $disabled = "";
                                        $color = "success";
                                    }
                                    if ($product["product_order_status"] == "2") {
                                        $farmer_text1 = "Complete";
                                        $customer_text = "Complete";
                                        $disabled = "disabled";
                                        $color = "success";
                                    }

                                    ?>
                                    <?php if ($_SESSION["rank"] == "farmer") : ?>
                                        <div class="d-flex border-top">
                                            <small class="w-50 text-center bg-primary text-light mx-2">
                                                <a class="btn text-light <?php echo $disabled ?>" data-bs-toggle="modal" data-bs-target="#order-info<?php echo $product['product_order_id'] ?>"><?php echo $farmer_text1 ?></a>
                                            </small>
                                            <?php if ($product["product_order_status"] == "0") : { ?>
                                                    <small class="w-50 text-center bg-<?php echo $color ?> text-light">
                                                        <a class="btn text-light <?php echo $disabled ?>" data-bs-toggle="modal" data-bs-target="#order-create<?php echo $product['product_order_id'] ?>"><?php echo "Approve" ?></a>
                                                    </small>
                                            <?php }
                                            endif ?>
                                            <?php if ($product["product_order_status"] == "1") : { ?>
                                                    <small class="w-50 text-center bg-<?php echo $color ?> text-light">
                                                        <a class="btn text-light <?php echo $disabled ?>" data-bs-toggle="modal" data-bs-target="#order-payment<?php echo $product['product_order_id'] ?>"><?php echo $farmer_text2 ?></a>
                                                    </small>
                                            <?php }
                                            endif ?>

                                        </div>
                                    <?php endif ?>

                                    <?php if ($_SESSION["rank"] == "customer") : ?>
                                        <?php if ($product["product_order_status"] == 0) {
                                            $disabled = "disabled";
                                        }
                                        if ($product["product_order_status"] == 1) {
                                            $disabled = "";
                                        }
                                        if ($product["product_order_status"] == 2) {
                                            $farmer_text = "Complete";
                                            $customer_text = "Complete";
                                            $disabled = "";
                                            $color = "success";
                                        }
                                        ?>
                                        <div class="d-flex border-top">
                                            <small class="w-100 text-center py-2 bg-<?php echo $color ?> text-light">
                                                <a class="btn text-light <?php echo $disabled ?>" data-bs-toggle="modal" data-bs-target="#order-info<?php echo $product['product_order_id'] ?>"><?php echo $customer_text ?></a>
                                            </small>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>

                    <?php }
                    endforeach; ?>
                </div>
            </div>
            <?php if ($_SESSION["rank"] == "farmer") : ?>
                <div class=" col-12 text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="page_assets/orders/reports.php">Generate report</a>
                </div>
            <?php endif ?>

            <!-- End of Tab 1 -->
        </div>
    </div>

</div>