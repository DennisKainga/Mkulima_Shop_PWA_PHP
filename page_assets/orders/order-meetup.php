<?php

$statement = $pdo->prepare("SELECT town.town_id,town.town_name,county.county_name
FROM town INNER JOIN county ON 
county.county_id=town.town_county_id");

$statement->execute();
$towns = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- Modal -->
<div class="modal fade" id="order-create<?php echo $product['product_order_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create meetup point</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="page_assets/orders/order-save.php">
                    <input type="hidden" name="prod_id" value="<?php echo $product["product_id"] ?>">
                    <input type="hidden" name="order_id" value="<?php echo $product["product_order_id"] ?>">
                    <input type="hidden" name="uid" value="<?php echo $product["product_order_sys_user_id"] ?>">
                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>Date Schedual</label>
                            <input require name="date" class="form-control" type="date">
                        </div>
                        <div class="form-group text-left mb-3 col">
                            <label>Time Schedual</label>
                            <input require name="time" class="form-control" type="time">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col">
                            <label>Town</label>
                            <select name="town" class="form-select" size="1" aria-label="size 1 select example">
                                <option selected disabled>Meetup point</option>
                                <?php foreach ($towns as $town) : { ?>
                                        <option value="<?php echo $town["town_id"] ?>"><?php echo $town["town_name"] . ',' . $town["county_name"] ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>