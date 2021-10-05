<?php
session_start();
include ('database.inc.php');
include ('function.inc.php');

//check admin login credentials
$msg="";
if (isset($_POST['submit'])) {
	$email=htmlspecialchars( $_POST['email'] );
	$password=htmlspecialchars( $_POST['password'] );

	$sql="select * from admin where email='$email' and password='$password' ";
	$res=mysqli_query($con,$sql);

	if(mysqli_num_rows($res)>0){

		$row=mysqli_fetch_assoc($res);
		$_SESSION['admin_login']='yes';
		$_SESSION['admin_name']=$row['name'];
		redirect('index.php');

	}
	else{
		$msg="Please enter valid login details";
	}
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Admin</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
	
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post">
										<span class="text-danger"><?php echo $msg; ?></span>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required autocomplete="off" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required autocomplete="off" />
											<small>
									            <a href="index.html">Forgot password?</a>
									        </small>
										</div>
										

										<div class="text-center mt-3">

											<input type="submit" class="btn btn-lg btn-primary" value="Sign In" name="submit" />
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- custom js file link  -->
	<script src="js/script.js"></script>

</body>

</html>