<?php

include ('top.php');

$msg="";
$memberName="";
$memberPhone="";
$memberAddress="";
$memberJoinDate="";
$memberSubscription="";
$memberSubscriptionDuration="";
$adhar="";
$pan="";
$photo="";
$totalAmount="";
$id="";
$blank="NA";




if(isset($_GET['id']) && $_GET['id']>0){
	$id=mysqli_real_escape_string( $con,htmlspecialchars( $_GET['id'] ) );


	$row=mysqli_fetch_assoc( mysqli_query($con,"select members.*,subscriptions.* from members,subscriptions where members.subscription=subscriptions.id and members.id='$id' ") );


	$memberName=$row['name'];
	$memberPhone=$row['phone'];
	$memberAddress=$row['address'];
	$memberJoinDate=$row['joinDate'];
	$memberSubscription=$row['subscription'];
	$memberSubscriptionDuration=$row['duration'];
	$totalAmount=$row[$memberSubscriptionDuration];
	



}


if (isset($_POST['submit'])) {

	$memberName=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['memberName'] ) );
	$memberPhone=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['memberPhone'] ) );
	$memberAddress=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['memberAddress'] ) );
	$memberJoinDate=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['memberJoinDate'] ) );
	$memberSubscription=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['memberSubscription'] ) );
	$memberSubscriptionDuration=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['memberSubscriptionDuration'] ) );

	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from subscriptions where id='$memberSubscription' "));

	$totalAmount=$row[$memberSubscriptionDuration];


	if($id==""){
		//here id is blank means admin wants to add new member
		$sql="select * from members where phone='$memberPhone' ";

	}
	else{
		//here id is set means admin wants to edit existing member
		$sql="select * from members where phone='$memberPhone' and id!='$id' ";

	}


	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){

		$msg="Member already exists";

	}
	else{

        
		//if id is not set then insert new menu
		if($id==""){

			$image_condition="";

			if( $_FILES['adhar']['name']!="" ) {
				$adharType=$_FILES['adhar']['type'];

				if($adharType!="image/jpeg" && $adharType!="image/png" && $adharType!="image/jpg" && $adharType!="application/pdf"){
					$msg="Invalid image format";
				}
				else{

					$adhar=rand(111111111,999999999).'_'.$_FILES['adhar']['name'];
					move_uploaded_file($_FILES['adhar']['tmp_name'],SERVER_DOC_IMAGE.$adhar);
					$image_condition=$image_condition.",'$adhar' ";

				}

			}
			else{
				$image_condition=$image_condition.",'$blank' ";
			}


			if($_FILES['pan']['name']!="" ){

				$panType=$_FILES['pan']['type'];

				if($panType!="image/jpeg" && $panType!="image/png" && $panType!="image/jpg" && $panType!="application/pdf"){
					$msg="Invalid image format";
				}
				else{

					$pan=rand(111111111,999999999).'_'.$_FILES['pan']['name'];
					move_uploaded_file($_FILES['pan']['tmp_name'],SERVER_DOC_IMAGE.$pan);
					$image_condition=$image_condition.",'$pan' ";

				}

			}
			else{
				$image_condition=$image_condition.",'$blank' ";
			}


			if($_FILES['photo']['name']!="" ){

				$photoType=$_FILES['photo']['type'];

				if($photoType!="image/jpeg" && $photoType!="image/png" && $photoType!="image/jpg" && $photoType!="application/pdf"){
					$msg="Invalid image format";
				}
				else{

					$photo=rand(111111111,999999999).'_'.$_FILES['photo']['name'];
					move_uploaded_file($_FILES['photo']['tmp_name'],SERVER_DOC_IMAGE.$photo);
					$image_condition=$image_condition.",'$photo' ";

				}


			}
			else{
				$image_condition=$image_condition.",'$blank' ";
			}

			if($msg==""){

				mysqli_query($con,"INSERT INTO `members`(`name`, `phone`, `address`, `joinDate`, `subscription`, `duration`, `totalAmount`,`adhar`, `pan`, `photo`) values('$memberName','$memberPhone','$memberAddress','$memberJoinDate','$memberSubscription','$memberSubscriptionDuration','$totalAmount' $image_condition)");
				redirect('pages-listMembers.php');

			}

		}
		else{
			//if id is set then update exsting member


			$image_condition="";

			if( $_FILES['adhar']['name']!="" ) {
				$adharType=$_FILES['adhar']['type'];

				if($adharType!="image/jpeg" && $adharType!="image/png" && $adharType!="image/jpg" && $adharType!="application/pdf"){
					$msg="Invalid image format";
				}
				else{

					$adhar=rand(111111111,999999999).'_'.$_FILES['adhar']['name'];
					move_uploaded_file($_FILES['adhar']['tmp_name'],SERVER_DOC_IMAGE.$adhar);
					$image_condition=$image_condition.", adhar='$adhar' ";

				}

			}

			if($_FILES['pan']['name']!="" ){

				$panType=$_FILES['pan']['type'];

				if($panType!="image/jpeg" && $panType!="image/png" && $panType!="image/jpg" && $panType!="application/pdf"){
					$msg="Invalid image format";
				}
				else{

					$pan=rand(111111111,999999999).'_'.$_FILES['pan']['name'];
					move_uploaded_file($_FILES['pan']['tmp_name'],SERVER_DOC_IMAGE.$pan);
					$image_condition=$image_condition.", pan='$pan' ";

				}

			}

			if($_FILES['photo']['name']!="" ){

				$photoType=$_FILES['photo']['type'];

				if($photoType!="image/jpeg" && $photoType!="image/png" && $photoType!="image/jpg" && $photoType!="application/pdf"){
					$msg="Invalid image format";
				}
				else{

					$photo=rand(111111111,999999999).'_'.$_FILES['photo']['name'];
					move_uploaded_file($_FILES['photo']['tmp_name'],SERVER_DOC_IMAGE.$photo);
					$image_condition=$image_condition.", photo='$photo' ";

				}


			}
			if($msg==""){
				mysqli_query($con,"UPDATE `members` SET `name`='$memberName',`phone`='$memberPhone',`address`='$memberAddress',`joinDate`='$memberJoinDate',`subscription`='$memberSubscription',`duration`='$memberSubscriptionDuration',`totalAmount`='$totalAmount' $image_condition WHERE id='$id' ");
				redirect('pages-listMembers.php');
			}
			
			
		}
		
		
	}
	
}


$res_subscriptions=mysqli_query($con,"select * from subscriptions");

?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Add Members</h1>
					</div>
					<hr>
					

					<?php 
					if(strlen( $msg ) > 0){
					?>
					<div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
					<?php
						}

					?>

					<form method="post" enctype="multipart/form-data" >
						  <div class="row">
							    <div class="col-sm-6 mb-3">
							    	<label for="memberName" class="form-label">Member Name<span class="redStar">*</span></label>
							        <input type="text" class="form-control" id="memberName" name="memberName" required value="<?php echo $memberName; ?>">
							    </div>
							    <div class="col-sm-6 mb-3">
							    	<label for="memberPhone" class="form-label">Member Phone<span class="redStar">*</span></label>
							      <input type="text" class="form-control" id="memberPhone" name="memberPhone" required value="<?php echo $memberPhone; ?>">
							    </div>
							  </div>

							  <div class="row">
							    <div class="col mb-3">
							    	<label for="memberAddress" class="form-label">Member Address<span class="redStar">*</span></label>
							      <textarea class="form-control" rows="3" id="memberAddress" name="memberAddress" required>
							      <?php echo $memberAddress; ?>
							      </textarea>
							    </div>
						  </div>

						   <div class="row">
							    <div class="col-sm-4 mb-3">
							    	<label for="memberJoinDate" class="form-label">Member Join Date<span class="redStar">*</span></label>
							      <input type="date" class="form-control" id="memberJoinDate" name="memberJoinDate" required value="<?php echo $memberJoinDate; ?>">
							    </div>
							     <div class="col-sm-4 mb-3">
							     	<label for="memberSubscription" class="form-label">Subscription Type<span class="redStar">*</span></label>
							      		<select class="form-select" id="memberSubscription" name="memberSubscription" required>
											
							      		<?php

							      		while ($row_subscription=mysqli_fetch_assoc($res_subscriptions)) {

							      			if($row_subscription['id']==$memberSubscription){
							      				echo "<option  value='". $row_subscription['id']."' selected >".$row_subscription['subscriptionName']."</option>";
							      			}
							      			else{
							      				echo "<option  value='". $row_subscription['id']."'>".$row_subscription['subscriptionName']."</option>";
							      			}
							      			
							      		}


							      		?>
										</select>
							    </div>
							     <div class="col-sm-4 mb-3">
							     	<label for="memberSubscriptionDuration" class="form-label">Subscription Duration<span class="redStar">*</span></label>
							     		<select class="form-select" id="memberSubscriptionDuration" name="memberSubscriptionDuration" required>
							     			<?php
							     				if($memberSubscriptionDuration=="monthly"){
							     			?>
							     			<option value="monthly" selected>Monthly</option>
							     			<?php	
							     				}
							     				else{
							     					?>
							     					<option value="monthly" >Monthly</option>
							     					<?php
							     				}
							     			?>

							     			<?php
							     				if($memberSubscriptionDuration=="weekly"){
							     			?>
							     			<option value="weekly" selected>Weekly</option>
							     			<?php	
							     				}
							     				else{
							     					?>
							     					<option value="weekly" >Weekly</option>

							     					<?php
							     				}
							     			?>
											<?php
							     				if($memberSubscriptionDuration=="15Days"){
							     			?>
							     			<option value="15Days" selected>15 Days</option>
							     			<?php	
							     				}
							     				else{
							     					?>
							     					<option value="15Days" >15 Days</option>
							     					<?php
							     				}
							     			?>
											
											
										</select>
							    </div>

						  </div>

						  <div class="row">
							  	<div class="col-sm-4 mb-3">
							  		<label for="adhar" class="form-label">Member Adhar Card</label>
  									<input class="form-control form-control-sm" type="file" id="adhar" name="adhar">
							  	
	  							</div>

	  							<div class="col-sm-4 mb-3">
							  		<label for="pan" class="form-label">Member PAN Card</label>
  									<input class="form-control form-control-sm" type="file" id="pan" name="pan">
							  	
	  							</div>

	  							<div class="col-sm-4 mb-3">
							  		<label for="photo" class="form-label">Member Photo</label>
  									<input class="form-control form-control-sm" type="file" id="photo" name="photo">
							  	
	  							</div>


						  </div>

						  <input type="submit" name="submit" class="btn btn-success" value="Submit">

					</form>

				

				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
	