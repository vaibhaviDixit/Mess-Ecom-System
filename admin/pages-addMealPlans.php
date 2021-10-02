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
						<h1 class="h3 d-inline align-middle">Add Meal Plans</h1>
				
					</div>
					<form>
						<div class="row">
							 <div class="col mb-3">
							    	<label for="mealDesc" class="form-label">Meal Description</label>
							       <textarea class="form-control" rows="3" id="mealDesc"></textarea>
							 </div>

						</div>

						<div class="row">
							 <div class="col-sm-4 mb-3">
							    	<label for="mealPrice" class="form-label">Meal Price</label>
							       <input type="text" class="form-control" rows="3" id="mealPrice">
							 </div>

							 <div class="col-sm-4 mb-3">
							    	<label for="mealType" class="form-label">Subscription Type</label>
							      	<select class="form-select mb-3" id="mealType">
											<option selected>Breakfast</option>
											<option>Lunch</option>
											<option>Dinner</option>
									</select>
							 </div>

							 <div class="col-sm-4 mb-3">
							    	<label for="mealPhoto" class="form-label">Meal Photo</label>
							    	<input class="form-control form-control-sm" type="file" id="mealPhoto">
							 </div>

						</div>

					
							<button class="btn btn-success">Add Meal</button>

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