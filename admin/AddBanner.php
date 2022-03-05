<?php

include 'top.php';

$msg="";
$bannerName="";
$bannerImg="";
$desc="";
$id="";
$image_status='required';


if(isset($_GET['id']) && $_GET['id']>0){
	$id=getSafeVal( $_GET['id'] );

	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from banner where id='$id' ") );

	$bannerName=$row['name'];
	$bannerImg=$row['image'];
	$desc=$row['description'];
	$image_status="";

}


if (isset($_POST['submit'])) {
	$bannerName=getSafeVal($_POST['bannerName']);
 	$desc=getSafeVal($_POST['desc']);

 	if($bannerName<=0){

		$msg="Please Select valid meal";
	}
	else{



	if($id==""){
		//here id is blank means admin wants to add new banner
		$sql="select * from banner where name='$bannerName' ";

	}
	else{
		//here id is set means admin wants to edit existing banner
		$sql="select * from banner where name='$bannerName' and id!='$id' ";

	}


	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){

		$msg="Already exists";

	}
	else{

        $type=$_FILES['bannerImg']['type'];
		//if id is not set then insert new menu
		if($id==""){

			//add validations on image
			if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
				$msg="Invalid image format";
			}
			else{

				$Img=rand(111111111,999999999).'_'.$_FILES['bannerImg']['name'];
				move_uploaded_file($_FILES['bannerImg']['tmp_name'],SERVER_MENU_IMAGE.$Img);

				mysqli_query($con,"insert into banner(`name`, `image`, `description`) values('$bannerName','$Img','$desc') ");
				redirect(SITE_PATH.'admin/manageBanner');

			}

		}
		else{
			//if id is set then update exsting menu

			$image_condition="";
			if($_FILES['bannerImg']['name']!=""){

				//add validations on image
				if($type!='image/jpeg' && $type!='image/png' && $type!='image/jpg'){
						$msg="Invalid image format";
				}
				else{
					$Img=rand(111111111,999999999).'_'.$_FILES['bannerImg']['name'];
					move_uploaded_file($_FILES['bannerImg']['tmp_name'],SERVER_MENU_IMAGE.$Img);


					$image_condition=", image='$Img' ";
					
					//now user is updating image so delete old image ..
					$oldImageRecord=mysqli_fetch_assoc(mysqli_query($con,"select image from banner where id='$id' "));
					$oldImage=$oldImageRecord['image'];
					unlink(SERVER_MENU_IMAGE.$oldImage);
				}
				

			}
			if($msg==""){
				mysqli_query($con,"update banner set name='$bannerName', description='$desc' $image_condition where id='$id'  ");
				redirect(SITE_PATH.'admin/manageBanner');
			}
			
		}
		
		
	}
}
	
}


?>

			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Banner Images</h1>
				
					</div>
					<hr>

					<?php 
					if(strlen( $msg ) > 0){
					?>
					<div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
					<?php
						}

					?>

					<form method="post" enctype="multipart/form-data" onsubmit="return validate()">
						  <div class="row">
							    <div class="col mb-3">
							    	<label for="bannerName" class="form-label">Name<span class="redStar">*</span></label>

							    	<select class="form-control" id="bannerName" name="bannerName" required>
							    		<option disabled selected value="0">Select Meal</option>
							    	<?php
							    		$mealRow=mysqli_query($con,"select * from meals");
							    		while($banners=mysqli_fetch_assoc($mealRow)){

							    			if($banners['id']==$bannerName){
							    				?>
							    		<option selected value="<?php echo $banners['id']; ?>">
							    			<?php echo $banners['mealName']; ?>
							    		</option>
							    				<?php
							    			}
							    			else{
							    	?>
							    		<option value="<?php echo $banners['id']; ?>">
							    			<?php echo $banners['mealName']; ?>
							    		</option>
							    	<?php
							    		}
							    	}
							    	?>
							    	</select>
							    </div>
						   </div>

						   <div class="row">
							    
							     <div class="col-sm-4 mb-3">
							     	<label for="bannerImg" class="form-label">Image 

							     		<?php if($image_status=='required')
							     		{
							     		?> 
							     		<span class="redStar">*</span>
							     		<?php
							     		}
							     		?>

							     	 </label>
							     	<input class="form-control form-control-sm" type="file" id="bannerImg" name="bannerImg" <?php echo $image_status; ?> onchange="loadImage(event)" >
							    </div>
							    <div class="col-sm-4 mb-3">
							    	<?php
							    		if(isset($bannerImg) && isset($_GET['id']) ){
							    	?>
							    	 <img width="100" height="100" id="dispBannerImage" src="<?php  echo SITE_MENU_IMAGE.$bannerImg; ?>">
							    	<?php
							    		}
							    	?>
							    </div>

						  </div>

						 <div class="row">
							    <div class="col mb-3">
							    	<label for="desc" class="form-label">Description<span class="redStar">*</span></label>
							       <textarea class="form-control" rows="3" id="desc" name="desc" required autocomplete="off"><?php echo $desc; ?></textarea>
							    </div>
						  </div>


						  <input type="submit" name="submit" class="btn btn-success" value="Submit">

					</form>

				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
			<script type="text/javascript">
				
				function validate(){
					name=$("#bannerName").val();
					desc=$("#desc").val();
					
					if(name<=0){
						alert("Please select valid name");
						return false;
					}
					if(desc.length>90 || desc.length<5){
						alert("Description length should be 5 to 80 characters long");
						return false;
					}
					return true;

				}

			</script>








