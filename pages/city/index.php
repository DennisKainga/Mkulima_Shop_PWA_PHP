<?php
$statement = $pdo->prepare("SELECT * FROM town");
$statement->execute();
$towns = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container-xxl py-5" id="app">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="mt-5 col-lg-6">
                <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Cities</h1>
                    <p>Edit/Create Cities</p>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="col-12 text-center wow fadeInUp mt-5 sticky-lg-top" data-wow-delay="0.1s">
                <a class="btn btn-primary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#citycreatemodal" href="">Create New City</a>
            </div>
            <?php include_once "create_modal.php" ?>
            <div class="container mt-5 mb-0">
                <div class="row">
                    <?php foreach ($towns as $town) : { ?>
                            <div class="col-md-4">
                                <div class="card p-3 mb-0 bg-white">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="icon d-flex flex-row align-items-center"> <i class="fa fa-user me-3"></i></i> </div>
                                            <div class="ms-2 c-details">
                                                <h6 class="mb-2"></h6> <span>Town</span>
                                            </div>
                                        </div>
                                        <div class="badge text-dark"> <span></span> </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="heading"><?php echo '<i class="fa fa-user text-secondary me-3"></i>' . ucwords($town["town_name"]) ?></p>
                                        <div class="mt-2 d-flex">
                                            <a class="btn btn-primary w-50 mx-2" data-bs-toggle="modal" data-bs-target="#updatemodal">Edit</a>
                                            <a class="btn btn-danger w-50 mx-2" href="engine/action.php?action=user_del&id=<?php echo $town["town_id"] ?>">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    endforeach; ?>
                </div>
            </div>
            <!-- End of Tab 1 -->
        </div>
    </div>
</div>