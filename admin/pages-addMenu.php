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
						<h1 class="h3 d-inline align-middle">Add Menu</h1>
				
					</div>

					<form>
						  <div class="row">
							    <div class="col mb-3">
							    	<label for="menuName" class="form-label">Menu Name</label>
							        <input type="text" class="form-control" id="menuName">
							    </div>
						   </div>

						 <div class="row">
							    <div class="col mb-3">
							    	<label for="menuDesc" class="form-label">Menu Description</label>
							       <textarea class="form-control" rows="3" id="menuDesc"></textarea>
							    </div>
						  </div>

						   <div class="row">
							    <div class="col-sm-4 mb-3">
							    	<label for="menuPrice" class="form-label">Menu Price</label>
							      <input type="date" class="form-control" id="menuPrice">
							    </div>
							     <div class="col-sm-4 mb-3">
							     	<label for="menuCate" class="form-label">Category Of Menu</label>
							      		<select class="form-select mb-3" id="menuCate">
											<option selected>Breakfast</option>
											<option>Lunch</option>
											<option>Dinner</option>
									   </select>
							    </div>
							     <div class="col-sm-4 mb-3">
							     	<label for="menuPhoto" class="form-label">Photo of Menu </label>
							     	<input class="form-control form-control-sm" type="file" id="menuPhoto">
							    </div>

						  </div>

						  <button class="btn btn-success">Add Menu</button>

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