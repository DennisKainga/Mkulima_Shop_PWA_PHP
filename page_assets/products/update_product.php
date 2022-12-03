<div class="modal fade" id="updatemodal<?php echo $product["product_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Product</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action='page_assets/products/update_engine.php'>
                    <input type="hidden" name="product_id" value="<?php echo $product["product_id"] ?>">
                    <div class="row">
                        <div class="form-group  mb-3 col">
                            <label>Product Name</label>
                            <input value="<?php echo $product["product_name"] ?>" require name="name" class="form-control" type="text">
                        </div>
                        <div class="form-group  mb-3 col">
                            <label>Product Price</label>
                            <input value="<?php echo $product["product_price"] ?>" require name="price" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  mb-3 col">
                            <label>Unit Type</label>
                            <input value="<?php echo $product["product_unit_type"] ?>" require name="unit_type" class="form-control" type="text">
                        </div>
                        <div class="form-group  mb-3 col">
                            <label>Product Quantity</label>
                            <input value="<?php echo $product["product_quantity"] ?>" require name="qty" class="form-control" type="text">
                        </div>


                    </div>
                    <div class="row">

                        <div class="form-group mb-3 col">
                            <label>Product Category</label>
                            <select name="cat" class="form-select" size="1">
                                <option disabled>Choose a category</option>
                                <?php foreach ($cats as $cat) : { ?>
                                        <option value="<?php echo $cat["category_id"] ?>"><?php echo $cat["category_name"] ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3 col">
                            <label>Stock Status</label>
                            <select name="stock" class="form-select" size="1">
                                <option disabled>Choose stock status</option>
                                <option value="0">Stocked</option>
                                <option value="1">Not Stocked</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>