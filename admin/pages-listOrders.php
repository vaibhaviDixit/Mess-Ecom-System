<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


 	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">

	<title>Admin</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="css/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
						<h1 class="h3 d-inline ">All Orders</h1>
					</div>
					<hr>

				<div class="container table-responsive fs-6">

					<table class="table table-striped  table-hover  table-sm pt-3" id="dttable">
					<thead class=" table-primary">
						<tr>

						<th scope="col">Customer Name</th>
						<th scope="col">Customer Phone</th>
						<th scope="col">Address</th>
						<th scope="col">Orders</th>
						<th scope="col">Amount</th>
						<th scope="col">Payment Mode</th>
						<th scope="col">Payment Status</th>
						<th scope="col">Order Status</th>

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
						<td scope="col">xyz</td>
						<td scope="col"> <button class="orderBtn pendingBtn" >Pending</button> </td>

						</tr>

						<tr>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col"> <button class="orderBtn deliveredBtn" >Delivered</button> </td>

						</tr>

						<tr>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col"> <button class=" orderBtn cancelledBtn" >Cancelled</button> </td>

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
	<script src="js/bootstrap.min.js"></script>

</body>

</html>