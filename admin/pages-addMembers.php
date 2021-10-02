<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Admin</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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

					<form>
						  <div class="row">
							    <div class="col-sm-6 mb-3">
							    	<label for="memberName" class="form-label">Member Name</label>
							        <input type="text" class="form-control" id="memberName">
							    </div>
							    <div class="col-sm-6 mb-3">
							    	<label for="memberPhone" class="form-label">Member Phone</label>
							      <input type="text" class="form-control" id="memberPhone">
							    </div>
							  </div>

							  <div class="row">
							    <div class="col mb-3">
							    	<label for="memberAddress" class="form-label">Member Address</label>
							      <textarea class="form-control" rows="3" id="memberAddress"></textarea>
							    </div>
						  </div>

						   <div class="row">
							    <div class="col-sm-4 mb-3">
							    	<label for="memberJoinDate" class="form-label">Member Join Date</label>
							      <input type="date" class="form-control" id="memberJoinDate">
							    </div>
							     <div class="col-sm-4 mb-3">
							     	<label for="memberSubscription" class="form-label">Subscription Type</label>
							      		<select class="form-select" id="memberSubscription">
											<option selected>Student</option>
											<option>Classic</option>
											<option>Executive</option>
										</select>
							    </div>
							     <div class="col-sm-4 mb-3">
							     	<label for="memberSubscriptionDuration" class="form-label">Subscription Duration</label>
							     		<select class="form-select" id="memberSubscriptionDuration">
											<option selected>Monthly</option>
											<option>Weekly</option>
											<option>15 Days</option>
										</select>
							    </div>

						  </div>

						  <div class="row">
							  	<div class="col-sm-4 mb-3">
							  		<label for="adhar" class="form-label">Choose Adhar Card</label>
  									<input class="form-control form-control-sm" type="file" id="adhar">
							  	
	  							</div>

	  							<div class="col-sm-4 mb-3">
							  		<label for="pan" class="form-label">Choose PAN Card</label>
  									<input class="form-control form-control-sm" type="file" id="pan">
							  	
	  							</div>

	  							<div class="col-sm-4 mb-3">
							  		<label for="photo" class="form-label">Choose Member Photo</label>
  									<input class="form-control form-control-sm" type="file" id="photo">
							  	
	  							</div>


						  </div>

						  <button class="btn btn-success">Add Member</button>

					</form>

				

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