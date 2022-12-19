<!-- Modal -->
<div class="modal fade" id="usercreatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="engine/signup.inc.php">
                    <input type="hidden" value="to_admin" name="to_admin">
                    <div class="row">
                        <div class="form-group mb-3 col">
                            <label>E-Mail</label>
                            <input value="<?php echo $sys_user[""] ?>" require name="login_email" class="form-control" type="text">
                        </div>
                        <div class="form-group mb-3 col">
                            <label>Phone</label>
                            <input value="<?php echo $sys_user[""] ?>" require name="sys_user_mobile" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  mb-3 col">
                            <label>First Name</label>
                            <input value="<?php echo $sys_user[""] ?>" require name="sys_user_first_name" class="form-control" type="text">
                        </div>
                        <div class="form-group  mb-3 col">
                            <label>Last Name</label>
                            <input value="<?php echo $sys_user[""] ?>" require name="sys_user_last_name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group mb-3 col">
                            <label>Town</label>
                            <select name="sys_user_town_id" class="form-select" size="1" aria-label="size 1 select example">
                                <option value="<?php echo $sys_user[""] ?>" disabled selected>value="<?php echo $sys_user[""] ?>"</option>
                                <?php foreach ($towns as $town) : { ?>
                                        <option value="<?php echo $town["town_id"] ?>"><?php echo $town["town_name"] . ',' . $town["county_name"] ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3 col">
                            <label>Rank</label>
                            <select name="rank" class="form-select" size="1" aria-label="size 1 select example">
                                <option selected disabled value="<?php echo $sys_user[] ?>">"<?php echo $sys_user[] ?>"</option>
                                <option value="farmer">Farmer</option>
                                <option value="customer">Customer</option>
                                <option value="admin">Admin</option>
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