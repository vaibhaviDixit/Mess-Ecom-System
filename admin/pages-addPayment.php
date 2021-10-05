<?php

include ('top.php');

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

				include 'footer.php';

			?>
