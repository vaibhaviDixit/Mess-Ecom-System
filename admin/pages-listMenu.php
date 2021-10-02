<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


 	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">

	<title>Admin</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
						<h1 class="h3 d-inline align-middle">Menu items</h1>
					</div>

				<div class="container table-responsive">

					<table class="table table-striped table-bordered table-hover table-sm pt-3 " id="dttable">
					<thead class="table-dark">
						<tr>

						<th scope="col">Photo</th>
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col">Category</th>
						<th scope="col">Price</th>
						<th scope="col">Action</th>

						</tr>
					</thead>
					<tbody>

						<tr>
						<td scope="col">Photo</td>
						<td scope="col">Name</td>
						<td scope="col">Description</td>
						<td scope="col">Category</td>
						<td scope="col">Price</td>
						<td scope="col">
							<a href=""><i class="fas fa-trash-alt"></i></a>
							<a href=""><i class="far fa-edit"></i></a>

						</td>

						</tr>

						
						
					</tbody>

					</table>


				</div>



					
				</div>
			</main>

		

			<?php

				include 'adminFooter.php';

			?>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
	<script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript">
		$(document).ready( function () {
	    $('#dttable').DataTable();
	} );
	</script>

	<script src="js/app.js"></script>

</body>

</html>