<?php
$cart_items = $_SESSION['cart'] ?? [];



?>
<!-- cart modal -->
<style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }
</style>
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Shopping cart</h5>
                <h5 class="modal-title" id="exampleModalLabel">Payment on delivery</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach ($cart_items as $i => $cart_item) : { ?>
                        <?php
                        $stmt = $pdo->prepare("SELECT * FROM products WHERE product_id=:id");
                        $stmt->bindValue(":id", $cart_item['id']);
                        $stmt->execute();
                        $product = $stmt->fetch(PDO::FETCH_ASSOC);

                        ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div>
                                            <img src="page_assets/products/<?php echo $product["product_image"] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                        </div>
                                        <div class="ms-3">
                                            <h5><?php echo $product["product_name"] ?></h5>
                                            <p class="small mb-0"><?php echo $product["product_unit_type"] ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <div style="width: 50px;">
                                            <h5 class="fw-normal mb-0"><?php echo $cart_item["qty"] ?></h5>
                                        </div>
                                        <div style="width: 80px;">
                                            <h5 class="mb-0"><?php echo $product["product_price"] . ' ksh' ?></h5>
                                        </div>
                                        <a href="engine/action.php?action=remove&cid=<?php echo $i ?>" style="color: #cecece;"><i class="text-danger fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                endforeach ?>
            </div>
            <div class="modal-footer">
                <a href="engine/action.php?action=checkout" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
</div>