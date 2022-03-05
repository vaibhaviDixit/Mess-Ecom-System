<?php

include ('top.php');

?>

			<main class="content">
				<div class="container-fluid p-4">

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
						<td scope="col"> <span class="badge rounded-pill bg-warning text-dark">Pending</span> </td>

						</tr>

						<tr>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col"> <span class="badge rounded-pill bg-success">Delivered</span> </td>

						</tr>

						<tr>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col">xyz</td>
						<td scope="col"> <span class="badge rounded-pill bg-danger">Cancelled</span> </td>

						</tr>

						
						
					</tbody>

					</table>


				</div>



					
				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
	