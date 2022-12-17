<?php
// $statement  = $pdo->prepare("SELECT product_order.product_order_qty FROM product_order WHERE product_order_id=:id");
// $statement->bindValue(":id", $product['product_order_id']);
// $statement->execute();
// $total_prods = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT products.product_price*product_order.product_order_qty AS total_amount FROM product_order
INNER JOIN products ON products.product_id=product_order.product_order_product_id WHERE product_order_id=:id");
$statement->bindValue(":id", $product['product_order_id']);
$statement->execute();
$total_prods = $statement->fetch(PDO::FETCH_ASSOC);

// var_dump($total_prods);
// exit;
?>
<!-- Modal -->
<div class="modal fade" id="order-payment<?php echo $product['product_order_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Total Amount due: <strong><?php echo $total_prods["total_amount"] . " ksh" ?><strong></h5>
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Fill payment Information</h5> -->
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="page_assets/orders/payment-engine.php">
                    <div class="row">
                        <input type="hidden" name="oid" value="<?php echo $product['product_order_id'] ?>">
                        <div class="form-group text-left mb-3 col">
                            <label>Amount Transacted</label>
                            <input require name="amount" class="form-control" type="number">
                        </div>
                        <div class="form-group text-left mb-3 col">
                            <label>Payment Ref</label>
                            <input require name="ref" class="form-control" type="text">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>