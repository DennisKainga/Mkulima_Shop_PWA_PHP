<?php include_once "includes/header.php" ?>

<body>
	<?php include_once "includes/nav.php" ?>
	<div class="page main-signin-wrapper mt-5">
		<!-- Row -->
		<div class="row text-center pl-0 pr-0 ml-0 mr-0 mt-5">
			<div class="col-lg-3 d-block mx-auto col-md-6 col-lg-6 col-xl-6">
				<div class="text-center mb-2">
					<!-- <img src="img/icon-1.png" class="header-brand-img" alt="logo"> -->
					<img src="img/icon-2.png" class="header-brand-img theme-logos" alt="logo">
				</div>
				<div class="card custom-card">
					<div class="card-body">
						<h4 class="text-center">Sign into Your Account</h4>
						<form method="POST" action="engine/login.inc.php">
							<div class="form-group text-left">
								<label>Email</label>
								<input required name="email" class="form-control" placeholder="Enter your Email" type="text">
							</div>
							<div class="form-group text-left">
								<label>Password</label>
								<input required name="password" class="form-control" placeholder="Enter your password" type="password">
							</div>
							<button class=" mt-5 btn ripple btn-primary btn-block">Sign In</button>
						</form>
						<div class="mt-3 text-center">
							<p class="mb-1"><a href="register.php">No account ? Register Here</a></p>
							<p class="mb-1"><a href="index.php">I just want to see products :)</a></p>
							<!-- <p class="mb-0">Don't have an account? <a href="signup.php">Create an Account</a></p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Row -->
	</div>
	<!-- End Page -->
	<?php include_once "includes/footer.php" ?>