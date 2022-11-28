<!-- Modal -->
<div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="form-group mb-3 col">
                            <label>Product Image</label>
                            <input require name="image" class="form-control" type="file">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group  mb-3 col">
                            <label>Product Name</label>
                            <input require name="product_name" class="form-control" type="text">
                        </div>
                        <div class="form-group  mb-3 col">
                            <label>Product Price</label>
                            <input require name="product_price" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  mb-3 col">
                            <label>Unit Type</label>
                            <input require name="product_unit_type" class="form-control" type="text">
                        </div>
                        <div class="form-group  mb-3 col">
                            <label>Product Quantity</label>
                            <input require name="product_quantity" class="form-control" type="text">
                        </div>


                    </div>
                    <div class="row">

                        <div class="form-group mb-3 col">
                            <label>Product Category</label>
                            <select name="cat" class="form-select" size="1" aria-label="size 1 select example">
                                <option selected>Choose a category</option>
                                <?php foreach ($cats as $cat) : { ?>
                                        <option value="<?php echo $cat["category_id"] ?>"><?php echo $cat["category_name"] ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3 col">
                            <label>Stock Status</label>
                            <select name="stock" class="form-select" size="1" aria-label="size 1 select example">
                                <option selected disabled>Choose stock status</option>
                                <option value="0">Stocked</option>
                                <option value="1s">Not Stocked</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>