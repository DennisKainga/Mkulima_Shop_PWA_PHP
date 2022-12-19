<!-- Modal -->

<div class="modal fade" id="updatemodal<?php echo $category['category_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="page_assets/categories/udpate_engine.php">
                    <input type="hidden" name="category_id" value="<?php echo $category['category_id'] ?>">
                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>Category Name</label>
                            <input require name="category_name" value="<?php echo $category['category_name'] ?>" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>Category Description</label>
                            <textarea rows="5" require name="category_desc" class="form-control" type="text" style="resize: none;"><?php echo $category["category_description"] ?></textarea>
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