<?php include_once "includes/header.php";
include_once "./engine/dbh.inc.php";
$rank = "customer";

$statement = $pdo->prepare("SELECT town.town_id,town.town_name,county.county_name FROM town 
INNER JOIN county ON county.county_id=town.town_county_id");
$statement->execute();
$towns = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
	<?php include_once "includes/nav.php" ?>
	<div class="page main-signin-wrapper mt-3">
		<div class="row text-center pl-0 pr-0 ml-0 mr-0">
			<div class="col-lg-3 d-block mx-auto col-md-6 col-lg-6 col-xl-6">
				<div class="text-center mb-2">
					<!-- <img src="img/icon-1.png" class="header-brand-img" alt="logo"> -->
					<img src="img/icon-2.png" class="header-brand-img theme-logos" alt="logo">
				</div>
				<div class="card custom-card ">
					<div class="card-body mb-5 mt-2">
						<h4 class="text-center">Signup to Your Account</h4>
						<form method="POST" action="engine/signup.inc.php">
							<div class="form-group text-left mb-3">
								<label>First Name</label>
								<input require name="sys_user_first_name" class="form-control" placeholder="Enter your First Name" type="text">
							</div>
							<div class="form-group text-left mb-3">
								<label>Last Name</label>
								<input require name="sys_user_last_name" class="form-control" placeholder="Enter your Last Name" type="text">
							</div>
							<div class="form-group text-left mb-3">
								<label>Phone Number</label>
								<input require name="sys_user_mobile" class="form-control" placeholder="Enter your Phone Numner" type="text">
							</div>
							<div class="form-group text-left mb-3">
								<label>Town</label>
								<select name="sys_user_town_id" class="form-select" size="1" aria-label="size 1 select example">
									<option selected>Current Residence</option>
									<?php foreach ($towns as $town) : { ?>
											<option value="<?php echo $town["town_id"] ?>"><?php echo $town["town_name"] . ',' . $town["county_name"] ?></option>
									<?php }
									endforeach; ?>
								</select>
							</div>
							<div class="form-group text-left mb-3">
								<label>Email</label>
								<input require name="login_email" class="form-control" placeholder="Enter your Email" type="email">
							</div>
							<div class="form-group text-left mb-3">
								<label>Password</label>
								<input require name="login_password" class="form-control" placeholder="Enter your password" type="password">
							</div>
							<div class="form-group text-left mb-3">
								<label>Repeat Password</label>
								<input require name="password_repeat" class="form-control" placeholder="Retype password" type="password">
							</div>
							<input type="hidden" name="rank" value="<?php echo $rank ?>">
							<button class="btn ripple btn-primary btn-block">Create Account</button>
						</form>
						<div class="mt-3 text-center">
							<p class="mb-0">Already have an account? <a href="login.php">Sign In</a></p>
							<p class="mb-1"><a href="index.php">I just want to see products :)</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Row -->

	</div>
	<!-- End Page -->

	<?php include_once "includes/footer.php" ?>

</body>