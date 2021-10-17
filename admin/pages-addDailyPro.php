<?php

include ('top.php');


$msg="";
$proName="";
$proDesc="";
$proPrice="";
$proCate="";
$proPhoto="";
$id="";
$image_status='required';


if(isset($_GET['id']) && $_GET['id']>0){
	$id=mysqli_real_escape_string( $con,htmlspecialchars( $_GET['id'] ) );

	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from dailyproducts where id='$id' ") );

	$proName=$row['proName'];
	$proDesc=$row['proDesc'];
	$proPrice=$row['proPrice'];
	$proCate=$row['proCate'];
	

	$image_status="";

}


if (isset($_POST['submit'])) {
	$proName=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['proName'] ) );
	$proDesc=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['proDesc'] ) );
	$proPrice=mysqli_real_escape_string($con, htmlspecialchars( $_POST['proPrice'] ) );
 	$proCate=mysqli_real_escape_string($con, htmlspecialchars( $_POST['proCate'] ) );


        $type=$_FILES['proPhoto']['type'];
		//if id is not set then insert new product
		if($id==""){

			//add validations on image
			if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
				$msg="Invalid image format";
			}
			else{

				$proPhoto=rand(111111111,999999999).'_'.$_FILES['proPhoto']['name'];
				move_uploaded_file($_FILES['proPhoto']['tmp_name'],SERVER_MENU_IMAGE.$proPhoto);

			      mysqli_query($con,"INSERT INTO `dailyproducts`(`proName`, `proDesc`, `proPrice`,  `proCate`, `proPhoto`) VALUES ('$proName','$proDesc','$proPrice','$proCate','$proPhoto' )");
			  	
			     
				redirect('pages-listDailyPro.php');

			}
		}
		
		else{
			//if id is set then update exsting product

			$image_condition="";
			if($_FILES['proPhoto']['name']!=""){

				//add validations on image
				if($type!='image/jpeg' && $type!='image/png' && $type!='image/jpg'){
						$msg="Invalid image format";
				}
				else{
					$proPhoto=rand(111111111,999999999).'_'.$_FILES['proPhoto']['name'];
					move_uploaded_file($_FILES['proPhoto']['tmp_name'],SERVER_MENU_IMAGE.$proPhoto);


					$image_condition=", proPhoto='$proPhoto' ";
		
				}
				

			}
			if($msg==""){
				mysqli_query($con,"update dailyproducts set proName='$proName',proDesc='$proDesc', proPrice='$proPrice',proCate='$proCate' $image_condition where id='$id'  ");
				redirect('pages-listDailyPro.php');
			}
			
		}
		
		
	}
	

$res_cate=mysqli_query($con,"select * from dailycate where status=1");

?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Daily Products</h1>
				
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
							    	<label for="proName" class="form-label">Product Name<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="proName" required name="proName" value="<?php echo $proName; ?>">
							 </div>

							 <div class="col-sm-6 mb-3">
							    	<label for="proPrice" class="form-label">Product Price<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="proPrice" required name="proPrice" value="<?php echo $proPrice; ?>">
							 </div>

						</div>

						<div class="row">
							 <div class="col mb-3">
							    	<label for="proDesc" class="form-label">Product Description<span class="redStar">*</span></label>
							       <textarea class="form-control" rows="3" id="proDesc" name="proDesc" required><?php echo $proDesc; ?></textarea>
							 </div>
						</div>

						<div class="row">
							 

							
					
								
								<div class="col-sm-4 mb-3">
										<label for="proCate" class="form-label">Product Category<span class="redStar">*</span></label>
									      	<select class="form-select mb-3" id="proCate" name="proCate" required>

									      	<?php

							      		while ($row_cate=mysqli_fetch_assoc($res_cate)) {

							      			if($row_cate['id']==$proCate){
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


								    	<label for="proPhoto" class="form-label">Product Photo <?php if($image_status=='required')
								     		{
								     		?> 
								     		<span class="redStar">*</span>
								     		<?php
								     		}
								     		?>
										</label>
								    	<input class="form-control form-control-sm" type="file" id="proPhoto" name="proPhoto"  <?php echo $image_status; ?> >


								 </div>
							</div>

						

					
							 <input type="submit" name="submit" class="btn btn-success" value="Submit">

					</form>


				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
