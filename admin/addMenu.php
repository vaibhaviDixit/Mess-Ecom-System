<?php

include ('top.php');

$msg="";
$menuName="";
$menuDesc="";
$menuPrice="";
$menuCate="";
$menuPhoto="";
$id="";
$image_status='required';


if(isset($_GET['id']) && $_GET['id']>0){
	$id=mysqli_real_escape_string( $con,htmlspecialchars( $_GET['id'] ) );

	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from menu where id='$id' ") );
	$menuName=$row['menuName'];
	$menuDesc=$row['menuDesc'];
	$menuPrice=$row['menuPrice'];
	$menuCate=$row['category_id'];
	$image_status="";

}


if (isset($_POST['submit'])) {
	$menuName=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['menuName'] ) );
	$menuDesc=mysqli_real_escape_string($con, htmlspecialchars( $_POST['menuDesc'] ) );
 	$menuPrice=mysqli_real_escape_string($con, htmlspecialchars( $_POST['menuPrice'] ) );
 	$menuCate=mysqli_real_escape_string($con, htmlspecialchars( $_POST['menuCate'] ) );

	if($id==""){
		//here id is blank means admin wants to add new category
		$sql="select * from menu where menuName='$menuName' ";

	}
	else{
		//here id is set means admin wants to edit existing category
		$sql="select * from menu where menuName='$menuName' and id!='$id' ";

	}


	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){

		$msg="Menu already exists";

	}
	else{

        $type=$_FILES['menuPhoto']['type'];
		//if id is not set then insert new menu
		if($id==""){

			//add validations on image
			if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
				$msg="Invalid image format";
			}
			else{

				$menuPhoto=rand(111111111,999999999).'_'.$_FILES['menuPhoto']['name'];
				move_uploaded_file($_FILES['menuPhoto']['tmp_name'],SERVER_MENU_IMAGE.$menuPhoto);

				mysqli_query($con,"insert into menu(`category_id`, `menuName`, `menuDesc`, `menuPrice`, `menuPhoto`, `status`) values('$menuCate','$menuName','$menuDesc','$menuPrice','$menuPhoto',1) ");
				redirect(SITE_PATH.'admin/listMenu');

			}

		}
		else{
			//if id is set then update exsting menu

			$image_condition="";
			if($_FILES['menuPhoto']['name']!=""){

				//add validations on image
				if($type!='image/jpeg' && $type!='image/png' && $type!='image/jpg'){
						$msg="Invalid image format";
				}
				else{
					$menuPhoto=rand(111111111,999999999).'_'.$_FILES['menuPhoto']['name'];
					move_uploaded_file($_FILES['menuPhoto']['tmp_name'],SERVER_MENU_IMAGE.$menuPhoto);


					$image_condition=", menuPhoto='$menuPhoto' ";
					
					//now user is updating image so delete old image ..
					$oldImageRecord=mysqli_fetch_assoc(mysqli_query($con,"select menuPhoto from menu where id='$id' "));
					$oldImage=$oldImageRecord['menuPhoto'];
					unlink(SERVER_MENU_IMAGE.$oldImage);
				}
				

			}
			if($msg==""){
				mysqli_query($con,"update menu set category_id='$menuCate', menuName='$menuName', menuDesc='$menuDesc',menuPrice='$menuPrice' $image_condition where id='$id'  ");
				redirect(SITE_PATH.'admin/listMenu');
			}
			
		}
		
		
	}
	
}


$res_categories=mysqli_query($con,"select * from category where status='1' ");

?>

			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Menu</h1>
				
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
							    <div class="col mb-3">
							    	<label for="menuName" class="form-label">Menu Name<span class="redStar">*</span></label>
							        <input type="text" class="form-control" id="menuName" name="menuName" required autocomplete="off" value="<?php echo $menuName; ?>">
							    </div>
						   </div>

						 <div class="row">
							    <div class="col mb-3">
							    	<label for="menuDesc" class="form-label">Menu Description<span class="redStar">*</span></label>
							       <textarea class="form-control" rows="3" id="menuDesc" name="menuDesc" required autocomplete="off"><?php echo $menuDesc; ?></textarea>
							    </div>
						  </div>

						   <div class="row">
							    <div class="col-sm-4 mb-3">
							    	<label for="menuPrice" class="form-label">Menu Price<span class="redStar">*</span></label>
							      <input type="text" class="form-control" id="menuPrice" name="menuPrice" required autocomplete="off" value="<?php echo $menuPrice; ?>">
							    </div>
							     <div class="col-sm-4 mb-3">
							     	<label for="menuCate" class="form-label">Category Of Menu<span class="redStar">*</span></label>
							      		<select class="form-select mb-3" id="menuCate" name="menuCate" required >

							      		<?php

							      		while ($row_category=mysqli_fetch_assoc($res_categories)) {

							      			if($row_category['id']==$menuCate){
							      				echo "<option  value='". $row_category['id']."' selected >".$row_category['name']."</option>";
							      			}
							      			else{
							      				echo "<option  value='". $row_category['id']."'>".$row_category['name']."</option>";
							      			}
							      			
							      		}


							      		?>

											
									   </select>
							    </div>
							     <div class="col-sm-4 mb-3">
							     	<label for="menuPhoto" class="form-label">Photo of Menu 

							     		<?php if($image_status=='required')
							     		{
							     		?> 
							     		<span class="redStar">*</span>
							     		<?php
							     		}
							     		?>

							     	 </label>
							     	<input class="form-control form-control-sm" type="file" id="menuPhoto" name="menuPhoto" <?php echo $image_status; ?> >
							    </div>

						  </div>

						  <input type="submit" name="submit" class="btn btn-success" value="Submit">

					</form>


					

				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>