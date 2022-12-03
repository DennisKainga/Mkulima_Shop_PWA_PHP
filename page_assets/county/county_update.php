<div class="modal fade" id="countyupdate<?php echo $county['county_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit County</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action='page_assets/county/update_engine.php'>
                    <input type="hidden" name="county_id" value="<?php echo $county["county_id"] ?>">
                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>County Name</label>
                            <input require name="county_name" value="<?php echo $county['county_name'] ?>" class="form-control" type="text">
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