<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Admin</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>
	<div class="wrapper">
		<?php

		include 'sidebarNav.php'

		?>

		<div class="main">
			
			<?php

				include 'adminTopNav.php';

			?>
			
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
					
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="img/pic-3.png" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">Christina Mason</h5>
									<div class="text-muted mb-2">Lead Developer</div>

									<div class="social d-flex justify-content-evenly">
									    <a href=""> <i class="fab fa-facebook p-2"></i> </a>
						                <a href=""> <i class="fab fa-instagram p-2"></i></a>
						                <a href=""> <i class="fab fa-whatsapp p-2"></i></a>
									</div>

									<button class="btn btn-success btn-sm mt-3 p-1">Change Password</button>
								</div>

								
								
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Basic Infromation</h5>
								</div>
								<div class="card-body text-center">

									<table class="table" style="text-align: left;">
									  <tbody>
									    <tr>
									      <th scope="row">Full Name</th>
									      <td>Chihoo Hwang</td>
									    </tr>
									   <tr>
									      <th scope="row">Email Address</th>
									      <td>example@mail.com</td>
									    </tr>
									    <tr>
									      <th scope="row">Phone Number</th>
									      <td>+123 456 789</td>
									    </tr>
									    <tr>
									      <th scope="row">Website</th>
									      <td>www.example.com</td>
									    </tr>
									     <tr>
									      <th scope="row">Location</th>
									      <td>New York, USA</td>
									    </tr>

									  </tbody>
									</table>
									

								</div>
							</div>

					
						</div>

					</div>

						<div class="col-md-8 col-xl-12">
								<div class="accordion accordion-flush" id="accordionFlushExample">

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Edit Profile
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      	

      		<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Edit Profile</h5>
								</div>
								
								<div class="card-body h-100">

											<form>
						  <div class="row">
							    <div class="col-sm-6 mb-3">
							    	<label for="adminName" class="form-label">Name</label>
							        <input type="text" class="form-control" id="adminName">
							    </div>
							    <div class="col-sm-6 mb-3">
							    	<label for="adminPhone" class="form-label">Phone</label>
							      <input type="text" class="form-control" id="adminPhone">
							    </div>
							  </div>

							  <div class="row">
							    <div class="col mb-3">
							    	<label for="adminLocation" class="form-label">Location</label>
							      <textarea class="form-control" rows="3" id="adminLocation"></textarea>
							    </div>
						  </div>

						   <div class="row">
							     <div class="col-sm-6 mb-3">
							    	<label for="adminEmail" class="form-label">Email</label>
							        <input type="email" class="form-control" id="adminEmail">
							    </div>
							    <div class="col-sm-6 mb-3">
							    	<label for="adminWeb" class="form-label">Website</label>
							      <input type="text" class="form-control" id="adminWeb">
							    </div>
							</div>

							 <div class="row">
						  
							  		<label class="form-label">Social Links</label>
							  		<div class="col-sm-4 mb-3">
										<i class="fab fa-facebook p-3"></i>
								        <input type="text" class="form-control">
							       </div>
							       <div class="col-sm-4 mb-3">
										<i class="fab fa-instagram p-3"></i>
								        <input type="text" class="form-control">
							       </div>
							       <div class="col-sm-4 mb-3">
										<i class="fab fa-whatsapp p-3"></i>
								        <input type="text" class="form-control">
							       </div>
  							
							 </div>


						  <button class="btn btn-success">Save Changes</button>

					</form>
								</div>
							</div>

      </div>
    </div>
  </div>

</div>
<!--  -->




				
							
						</div>
					</div>

			
			</main>

			<?php

				include 'adminFooter.php';

			?>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>