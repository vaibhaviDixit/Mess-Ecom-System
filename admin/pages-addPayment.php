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
						<h1 class="h3 d-inline align-middle">Add Payment</h1>
					</div>

					<form>
				

					 	<div class="row">
								    <div class="col-sm-6 mb-3">
								     	<label for="selectMember" class="form-label">Select Member</label>
								      		<select class="form-select" id="selectMember">
												<option selected>abc</option>
												<option>xyz</option>
												<option>lmn</option>
											</select>
								    </div>
								    <div class="col-sm-6 mb-3">
								     	<label for="payDate" class="form-label">Date</label>
								     	<input type="date"  class="form-control" id="payDate" >
								     		
								    </div>

						</div>

						<div class="row">
								    <div class="col-sm-3 mb-3">
								     	<label for="totalAmount" class="form-label">Total Amount</label>
								      	<input type="text"  class="form-control" id="totalAmount" >
								    </div>
								    <div class="col-sm-3 mb-3">
								     	<label for="amountPaid" class="form-label">Amount Paid</label>
								      	<input type="text"  class="form-control" id="amountPaid" >
								    </div>
								    <div class="col-sm-3 mb-3">
								     	<label for="amountLeft" class="form-label">Amount Left</label>
								      	<input type="text"  class="form-control" id="amountLeft" >
								    </div>
								    <div class="col-sm-3 mb-3">
								     	<label for="payAmount" class="form-label">Pay Amount</label>
								      	<input type="text"  class="form-control" id="payAmount" >
								    </div>

						</div>

						<button class="btn btn-success">Add Payment</button>

					</form>
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