<?php
$statement = $pdo->prepare("SELECT * FROM county");
$statement->execute();
$countys = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-xxl py-5" id="app">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="mt-5 col-lg-6">
                <div class="section-header text-start mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">County</h1>
                    <p>Edit/Create Counties</p>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="col-12 text-center wow fadeInUp mt-5 sticky-lg-top" data-wow-delay="0.1s">
                <a class="btn btn-primary rounded-pill py-3 px-5" data-bs-toggle="modal" data-bs-target="#citycreatemodal" href="">Create New County</a>
            </div>
            <div class="container mt-5 mb-3">
                <div class="row">
                    <?php foreach ($countys as $county) : { ?>
                            <div class="col-md-4 mb-2">
                                <div class="card p-3 mb-3 bg-white">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="icon d-flex flex-row align-items-center"> <i class="fa fa-user me-3"></i></i> </div>
                                            <div class="ms-2 c-details">
                                                <h6 class="mb-0"></h6> <span>County</span>
                                            </div>
                                        </div>
                                        <div class="badge text-dark"> <span></span> </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="heading"><?php echo '<i class="fa fa-user text-secondary me-3"></i>' . ucwords($county["county_name"]) ?></p>
                                        <div class="mt-2 d-flex">
                                            <a class="btn btn-primary w-50 mx-2" data-bs-toggle="modal" data-bs-target="#countyupdate<?php echo $county['county_id'] ?>">Edit</a>
                                            <a class="btn btn-danger w-50 mx-2" href="engine/action.php?action=county_del&id=<?php echo $county["county_id"] ?>">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php include "county_update.php" ?>
                            </div>
                    <?php }
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "create_county.php" ?>
</div>