<?php

include ('top.php');

$msg="";
$subName="";
$subDesc="";
$days15Pr="";
$weeklyPr="";
$monthlyPr="";

$id="";




if(isset($_GET['id']) && $_GET['id']>0){
	$id=mysqli_real_escape_string( $con,htmlspecialchars( $_GET['id'] ) );


	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from subscriptions where id='$id' ") );


		$subName=$row['subscriptionName'];
		$subDesc=$row['description'];
		$days15Pr=$row['15Days'];
		$weeklyPr=$row['weekly'];
		$monthlyPr=$row['monthly'];


}


if (isset($_POST['submit'])) {


	$subName=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['subName'] ) );
	$subDesc=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['subDesc'] ) );
	$days15Pr=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['days15Pr'] ) );
	$weeklyPr=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['weeklyPr'] ) );
	$monthlyPr=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['monthlyPr'] ) );



	if($id==""){
		//here id is blank means admin wants to add new subscription
		$sql="select * from subscriptions where subscriptionName='$subName'";
		

	}
	else{
		//here id is set means admin wants to edit existing subscription
		$sql="select * from subscriptions where subscriptionName='$subName' and id!='$id' ";
	}


	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){

		$msg="Subscription already exists";

	}
	else{

        
		//if id is not set then insert new menu
		if($id==""){
			if($msg==""){

				mysqli_query($con,"INSERT INTO `subscriptions`(`subscriptionName`, `description`, `15Days`, `weekly`, `monthly`) VALUES ('$subName','$subDesc','$days15Pr','$weeklyPr','$monthlyPr')");
				echo "INSERT INTO `subscriptions`(`subscriptionName`, `description`, `15Days`, `weekly`, `monthly`) VALUES ('$subName','$subDesc','$days15Pr','$weeklyPr','$monthlyPr')";
				// redirect('pages-listMembers.php');

			}

		}
		else{
			//if id is set then update exsting member

			if($msg==""){
				mysqli_query($con,"update subscriptions set subscriptionName='$subName',description='$subDesc',15Days='$days15Pr',weekly='$weeklyPr',monthly='$monthlyPr' where id='$id' ");

			

				// redirect('pages-listMembers.php');
			}
			
			
		}
		
		
	}
	
}


?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Subscription</h1>
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
							     <div class="col-sm-8 mb-3">
							     	<label for="subName" class="form-label">Subscription Name<span class="redStar">*</span></label>
							     	 <input type="text" class="form-control" id="subName" name="subName" required value="<?php echo $subName; ?>">
							      		
							    </div>
							   

						  </div>

				
						  <div class="row">
							    <div class="col mb-3">
							    	<label for="subDesc" class="form-label">Subscription Description<span class="redStar">*</span></label>
							      <textarea class="form-control" rows="3" id="subDesc" name="subDesc" required>
							      <?php echo $subDesc; ?>
							      </textarea>
							    </div>
						  </div>

						  <div class="row">
						  	 <div class="col-sm-4 mb-3">
							     	<label for="days15Pr" class="form-label">15 Days Price<span class="redStar">*</span></label>
							     	<input type="text" class="form-control" id="days15Pr" name="days15Pr" required value="<?php echo $days15Pr; ?>">
							  </div>
							  <div class="col-sm-4 mb-3">
							     	<label for="weeklyPr" class="form-label">Weekly Price<span class="redStar">*</span></label>
							     	<input type="text" class="form-control" id="weeklyPr" name="weeklyPr" required value="<?php echo $weeklyPr; ?>">
							  </div>
							  <div class="col-sm-4 mb-3">
							     	<label for="monthlyPr" class="form-label">Monthly Price<span class="redStar">*</span></label>
							     	<input type="text" class="form-control" id="monthlyPr" name="monthlyPr" required value="<?php echo $monthlyPr; ?>">
							  </div>

						  </div>
						

						  

						  <input type="submit" name="submit" class="btn btn-success" value="Submit">

					</form>

				

				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
	