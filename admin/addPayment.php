<?php

include ('top.php');
$sql="select members.*, subscriptions.subscriptionName from members,subscriptions  where members.subscription=subscriptions.id ";
$res=mysqli_query($con,$sql);
$totalAmount="";
$paidAmount="";
$leftAmount="";
$subscriptionName="";
$memberId="";
$msg="";

 if(isset($_POST['selectMember'])){
   $memberId=$_POST['selectMember'];
   $memSql="select members.*, subscriptions.subscriptionName from members,subscriptions  where members.subscription=subscriptions.id and members.id='$memberId' ";
   
   if(mysqli_num_rows(mysqli_query($con,$memSql)) >0 ){
	   $idRow=mysqli_fetch_assoc(mysqli_query($con,$memSql));

	   $subscriptionName=$idRow['subscriptionName'];
	   $totalAmount=$idRow['totalAmount'];
	   $paidAmount=$idRow['paidAmount'];
	   $leftAmount=intval($idRow['totalAmount'])-intval($idRow['paidAmount']);
   
   }
}

if(isset($_POST['submitpaydue'])){
	$payAmount=$_POST['payAmount'];
	$mid=$_POST['mid'];
	$tAmount=$_POST['tAmount'];


	if(isset($mid) && intval($mid)<=0){
		$msg="Please Select Valid Member";
	}
	else{
		if(intval($payAmount)>intval($tAmount) ){
			$msg="Paying amount should not greater than total amount...";
		}
		else{
			$runUpdate=mysqli_query($con,"update members set paidAmount='$payAmount' where id='$mid' ");
			if($runUpdate){
				?>
				<script type="text/javascript">
					swal("Payment Updated Successfully..","","Success");
				</script>
				<?php
				redirect(SITE_PATH.'admin/addPayment');
			}
		}
	}
}

?>

			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Add Payment</h1>
					</div>

				<?php 
               		if(strlen(trim($msg)) > 0){
               	?>
            			<div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
            	<?php
               		}
               
               	?> 

					 	<div class="row">
								    <div class="col-sm-6 mb-3">
								     	<label for="selectMember" class="form-label">Select Member</label>
								     	<form method="post" name="membersOptionForm">
								      		<select class="form-select" id="selectMember" name="selectMember" required onchange="this.form.submit();">
												<option selected disabled>Select Member</option>
												<?php
													while($row=mysqli_fetch_assoc($res)){
														if($memberId==$row['id']){
												?>
													<option selected value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
												<?php
														}
														else{
															?>
															<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
															<?php
														}
													}
												?>
												
											</select>
										</form>
								    </div>

								    <div class="col-sm-6 mb-3">
								    	<label for="subscriptionName" class="form-label">Subscription</label>
								      	<input type="text"  class="form-control" id="subscriptionName" value="<?php echo $subscriptionName; ?>" readonly>
								    </div>


						</div>
		           <form method="post">
						<div class="row">
								    <div class="col-sm-3 mb-3">
								     	<label for="totalAmount" class="form-label">Total Amount</label>
								      	<input type="text"  class="form-control" id="totalAmount" name="totalAmount" value="<?php echo $totalAmount; ?>" readonly>
								    </div>
								    <div class="col-sm-3 mb-3">
								     	<label for="amountPaid" class="form-label">Amount Paid</label>
								      	<input type="text"  class="form-control" id="amountPaid" name="amountPaid" value="<?php echo $paidAmount; ?>" readonly>
								    </div>
								    <div class="col-sm-3 mb-3">
								     	<label for="leftAmount" class="form-label">Amount Left</label>
								      	<input type="text"  class="form-control" id="leftAmount" name="leftAmount" readonly value="<?php echo $leftAmount; ?>">
								    </div>
								    <div class="col-sm-3 mb-3">
								     	<label for="payAmount" class="form-label">Pay Amount<span class="redStar">*</span></label>
								      	<input type="text"  class="form-control" id="payAmount" name="payAmount" required>
								      	<input type="hidden" name="mid" required value="<?php echo $memberId; ?>">
								      	<input type="hidden" name="tAmount" required value="<?php echo $totalAmount; ?>">
								    </div>

						</div>

						<input class="btn btn-success text-light" type="submit" name="submitpaydue" value="Add Payment">

					</form>
				</div>






			</main>

		

			<?php

				include 'footer.php';

			?>
