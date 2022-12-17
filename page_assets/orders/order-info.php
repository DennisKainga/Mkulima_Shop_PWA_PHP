<?php
if ($_SESSION["rank"] == "farmer") {
    $statement = $pdo->prepare("SELECT town.town_id,town.town_name,county.county_name FROM town 
    INNER JOIN county ON county.county_id=town.town_county_id");
    $statement->execute();
    $towns = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement = $pdo->prepare("SELECT sys_user.*,county.*,town.* FROM sys_user 
    INNER JOIN town ON town_id = sys_user.sys_user_town_id INNER JOIN county ON county.county_id=town.town_county_id
    WHERE sys_user.sys_user_id=:id ");
    $statement->bindValue(":id", $product["product_order_sys_user_id"]);
    $statement->execute();
    $order_info = $statement->fetch(PDO::FETCH_ASSOC);
}
if ($_SESSION["rank"] == "customer") {
    $statement = $pdo->prepare("SELECT pickup_point.*,town.town_name,county.county_name FROM pickup_point
    INNER JOIN town ON town.town_id =pickup_point.pickup_point_town_id INNER JOIN county ON county.county_id=town.town_county_id
    WHERE pickup_point_product_order_id=:id");
    $statement->bindValue(":id", $product['product_order_id']);
    $statement->execute();
    $order_info = $statement->fetch(PDO::FETCH_ASSOC);
    // var_dump($order_info);
    // exit;
}
?>
<!-- Modal -->
<?php if ($_SESSION['rank'] == "farmer") : ?>
    <div class="modal fade" id="order-info<?php echo $product['product_order_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Order Info</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="page_assets/county/save.php">
                        <div class="row">
                            <div class="form-group text-left mb-3 col">
                                <label>Name</label>
                                <input disabled class="form-control" type="text" value="<?php echo $order_info["sys_user_first_name"] . " " . $order_info["sys_user_last_name"] ?>">
                            </div>
                            <div class="form-group text-left mb-3 col">
                                <label>Phone</label>
                                <input disabled class="form-control" type="text" value="<?php echo $order_info["sys_user_mobile"] ?>">
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col">
                                <label>Location</label>
                                <input disabled class="form-control" type="text" value="<?php echo $order_info["county_name"] . ", " . $order_info["town_name"] ?>">

                            </div>
                            <div class="form-group mb-3 col">
                                <label>Date ordered</label>
                                <input disabled class="form-control" type="text" value="<?php echo $product["product_order_date"] ?>">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php elseif ($_SESSION["rank"] == "customer") : ?>
    <div class="modal fade" id="order-info<?php echo $product['product_order_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Order Info</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="#">
                        <div class="row">
                            <div class="form-group text-left mb-3 col">
                                <label>Time</label>
                                <input disabled class="form-control" type="text" value="<?php echo $order_info["pickup_point_time"] ?>">
                            </div>
                            <div class="form-group text-left mb-3 col">
                                <label>Date</label>
                                <input disabled class="form-control" type="text" value="<?php echo $order_info["pickup_point_date"] ?>">
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="form-group text-left mb-3 col">
                        <label>Location</label>
                        <input disabled class="form-control" type="text" value="<?php echo $order_info["county_name"] . ", " . $order_info["town_name"] ?>">

                    </div>

                </div>
                </form>
            </div>
        <?php endif ?>
        </div>
    </div>