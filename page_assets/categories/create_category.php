<!-- Modal -->
<div class="modal fade" id="catcreatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Category</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="page_assets/categories/save.php">
                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>Category Name</label>
                            <input require name="category_name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>Category Description</label>
                            <textarea rows="5" require name="category_desc" class="form-control" type="text" style="resize: none;"></textarea>
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