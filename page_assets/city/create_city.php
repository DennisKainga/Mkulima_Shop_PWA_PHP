<?php
$statement = $pdo->prepare("SELECT * FROM county");
$statement->execute();
$countys = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Modal -->
<div class="modal fade" id="citycreatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New City</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action='page_assets/city/save.php'>
                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>City Name</label>
                            <input require name="city_name" class="form-control" type="text">
                        </div>
                        <div class="form-group mb-3 col">
                            <label>County</label>
                            <select name="county_id" class="form-select" size="1" aria-label="size 1 select example">
                                <option selected disabled>County Name</option>
                                <?php foreach ($countys as $county) : { ?>
                                        <option value="<?php echo $county["county_id"] ?>"><?php echo $county["county_name"] ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>Description</label>
                            <input require name="description" class="form-control" type="text">
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