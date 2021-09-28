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
						<h1 class="h3 d-inline align-middle">Delivered Orders</h1>
					</div>

				<div class="container">

					<table class="table table-striped table-bordered table-hover table-responsive table-sm" id="dttable">
					<thead>
						<tr>

						<th scope="col">Customer Name</th>
						<th scope="col">Customer Phone</th>
						<th scope="col">Delivery Address</th>
						<th scope="col">Orders</th>
						<th scope="col">Amount</th>
						<th scope="col">Status</th>

						</tr>
					</thead>
					<tbody>

						<tr>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
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