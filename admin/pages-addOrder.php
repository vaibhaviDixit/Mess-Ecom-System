<?php

include ('top.php');

?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Add Order</h1>
				
					</div>
					<div class="row">
						<div class="col-12 col-lg-12">
							<div class="card">
						

								<div class="card-header">
									<h5 class="card-title mb-0">Customer Name</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" placeholder="Input">
								</div>

								<div class="card-header">
									<h5 class="card-title mb-0">Date</h5>
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
							
							<button class="btn btn-success">Add Order</button>


						
						</div>

					
					</div>

				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
