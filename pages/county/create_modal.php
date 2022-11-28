<!-- Modal -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $county_name = $_POST["county_name"];
    $statement = $pdo->prepare("INSERT INTO county (county_name) VALUES(:name)");
    $statement->bindValue(":name", $county_name);
    $statement->execute();
    header("Refresh:0");
}
?>
<div class="modal fade" id="citycreatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New County</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="form-group text-left mb-3 col">
                            <label>County Name</label>
                            <input require name="county_name" class="form-control" type="text">
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