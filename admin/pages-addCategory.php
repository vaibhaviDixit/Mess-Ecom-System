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
						<h1 class="h3 d-inline align-middle">Add Category</h1>
				
					</div>
					<form>
				

					 	<div class="row">
								    <div class="col-sm-12 mb-3">
								     	<label for="catName" class="form-label">Category Name</label>
								     	<input type="text" class="form-control" id="catName">
								      		
								    </div>
						</div>

						<div class="row">
								    <div class="col-sm-12 mb-3">
								     	<label for="catDesc" class="form-label">Description of Category</label>
							           <textarea class="form-control" rows="3" id="catDesc"></textarea>
								      		
								    </div>
						</div>

						<button class="btn btn-success">Add Category</button>

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