<?php

include ('top.php');


$msg="";
$mealName="";
$mealDesc="";
$mealPrice="";
$mealSubscription="";
$mealType="";
$mealPhoto="";
$id="";
$image_status='required';


if(isset($_GET['id']) && $_GET['id']>0){
	$id=mysqli_real_escape_string( $con,htmlspecialchars( $_GET['id'] ) );

	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from meals where id='$id' ") );

	$mealName=$row['mealName'];
	$mealDesc=$row['mealDesc'];
	$mealPrice=$row['mealPrice'];
	$mealSubscription=$row['mealSubscription'];
	$mealType=$row['mealType'];
	

	$image_status="";

}


if (isset($_POST['submit'])) {
	$mealName=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['mealName'] ) );
	$mealDesc=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['mealDesc'] ) );
	$mealPrice=mysqli_real_escape_string($con, htmlspecialchars( $_POST['mealPrice'] ) );
	$mealSubscription=mysqli_real_escape_string($con, htmlspecialchars( $_POST['mealSubscription'] ) );
 	$mealType=mysqli_real_escape_string($con, htmlspecialchars( $_POST['mealType'] ) );


        $type=$_FILES['mealPhoto']['type'];
		//if id is not set then insert new menu
		if($id==""){

			//add validations on image
			if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
				$msg="Invalid image format";
			}
			else{

				$mealPhoto=rand(111111111,999999999).'_'.$_FILES['mealPhoto']['name'];
				move_uploaded_file($_FILES['mealPhoto']['tmp_name'],SERVER_MENU_IMAGE.$mealPhoto);

			      mysqli_query($con,"INSERT INTO `meals`(`mealName`, `mealDesc`, `mealPrice`, `mealSubscription`, `mealType`, `mealPhoto`) VALUES ('$mealName','$mealDesc','$mealPrice','$mealSubscription','$mealType','$mealPhoto' )");
			  	

				redirect('pages-listMealPlans.php');

			}
		}
		
		else{
			//if id is set then update exsting menu

			$image_condition="";
			if($_FILES['mealPhoto']['name']!=""){

				//add validations on image
				if($type!='image/jpeg' && $type!='image/png' && $type!='image/jpg'){
						$msg="Invalid image format";
				}
				else{
					$mealPhoto=rand(111111111,999999999).'_'.$_FILES['mealPhoto']['name'];
					move_uploaded_file($_FILES['mealPhoto']['tmp_name'],SERVER_MENU_IMAGE.$mealPhoto);


					$image_condition=", mealPhoto='$mealPhoto' ";
		
				}
				

			}
			if($msg==""){
				mysqli_query($con,"update meals set mealName='$mealName',mealDesc='$mealDesc', mealPrice='$mealPrice', mealSubscription='$mealSubscription',mealType='$mealType' $image_condition where id='$id'  ");
				redirect('pages-listMealPlans.php');
			}
			
		}
		
		
	}
	



$res_subscriptions=mysqli_query($con,"select * from subscriptions");
$res_cate=mysqli_query($con,"select * from category where status=1");

?>

			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Meals</h1>
				
					</div>
					<hr>

					<?php 
					if(strlen( $msg ) > 0){
					?>
					<div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
					<?php
						}

					?>


					<form method="post" enctype="multipart/form-data">
						<div class="row">
							 <div class="col-sm-6 mb-3">
							    	<label for="mealName" class="form-label">Meal Name<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="mealName" required name="mealName" value="<?php echo $mealName; ?>">
							 </div>

							 <div class="col-sm-6 mb-3">
							    	<label for="mealPrice" class="form-label">Meal Price<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="mealPrice" required name="mealPrice" value="<?php echo $mealPrice; ?>">
							 </div>

						</div>

						<div class="row">
							 <div class="col mb-3">
							    	<label for="mealDesc" class="form-label">Meal Description<span class="redStar">*</span></label>
							       <textarea class="form-control" rows="3" id="mealDesc" name="mealDesc" required><?php echo $mealDesc; ?></textarea>
							 </div>
						</div>

						<div class="row">
							 

							 <div class="col-sm-4 mb-3">
							    	<label for="mealSubscription" class="form-label">Meal Subscription<span class="redStar">*</span></label>
							      	<select class="form-select mb-3" id="mealSubscription" name="mealSubscription" required>
											<?php

							      		while ($row_subscription=mysqli_fetch_assoc($res_subscriptions)) {

							      			if($row_subscription['id']==$mealSubscription){
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
										<label for="mealType" class="form-label">Meal Category<span class="redStar">*</span></label>
									      	<select class="form-select mb-3" id="mealType" name="mealType" required>

									      	<?php

							      		while ($row_cate=mysqli_fetch_assoc($res_cate)) {

							      			if($row_cate['id']==$mealType){
							      				echo "<option  value='". $row_cate['id']."' selected >".$row_cate['name']."</option>";
							      			}
							      			else{
							      				echo "<option  value='". $row_cate['id']."'>".$row_cate['name']."</option>";
							      			}
							      			
							      		}


							      		?>
													
											</select>
								</div>

								 <div class="col-sm-4 mb-3">


								    	<label for="mealPhoto" class="form-label">Meal Photo <?php if($image_status=='required')
								     		{
								     		?> 
								     		<span class="redStar">*</span>
								     		<?php
								     		}
								     		?>
										</label>
								    	<input class="form-control form-control-sm" type="file" id="mealPhoto" name="mealPhoto"  <?php echo $image_status; ?> >


								 </div>
							</div>

						

					
							 <input type="submit" name="submit" class="btn btn-success" value="Submit">

					</form>


				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
