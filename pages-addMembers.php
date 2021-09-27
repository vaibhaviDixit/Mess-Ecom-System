<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Admin</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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
						<h1 class="h3 d-inline align-middle">Add Members</h1>
				
					</div>
					<div class="row">
						<div class="col-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Member Name</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" placeholder="Input">
								</div>
								
								<div class="card-header">
									<h5 class="card-title mb-0">Member Phone</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" placeholder="Input">
								</div>
								

								<div class="card-header">
									<h5 class="card-title mb-0">Member Address</h5>
								</div>
								<div class="card-body">
									<textarea class="form-control" rows="2" placeholder="Textarea"></textarea>
								</div>

								<div class="card-header">
									<h5 class="card-title mb-0">Member Join Date</h5>
								</div>
								<div class="card-body">
									<input type="date" class="form-control" placeholder="Input">
								</div>


								<div class="card-header">
									<h5 class="card-title mb-0">Subscription Type</h5>
								</div>
								<div class="card-body">
									<select class="form-select mb-3">
										<option selected>Student</option>
										<option>Classic</option>
										<option>Executive</option>
									</select>
		
								</div>

								<div class="card-header">
									<h5 class="card-title mb-0">Subscription Duration</h5>
								</div>
								<div class="card-body">
									<select class="form-select mb-3">
										<option selected>Monthly</option>
										<option>Weekly</option>
										<option>15 Days</option>
									</select>
		
								</div>

								

							</div>
							
							<button class="btn btn-success">Add Member</button>


						
						</div>

					
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