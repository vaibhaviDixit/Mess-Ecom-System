
<?php


include ('top.php');

$msg="";
$dailycate="";
$description="";
$id="";




if(isset($_GET['id']) && $_GET['id']>0){
	$id=mysqli_real_escape_string( $con,htmlspecialchars( $_GET['id'] ) );


	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from dailycate where id='$id' ") );
	$dailycate=$row['name'];
	$description=$row['description'];

}


if (isset($_POST['submit'])) {
	$dailycate=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['dailycate'] ) );
	$description=mysqli_real_escape_string($con, htmlspecialchars( $_POST['description'] ) );
 

	if($id==""){
		//here id is blank means admin wants to add new dailycate
		$sql="select * from dailycate where name='$dailycate' ";

	}
	else{
		//here id is set means admin wants to edit existing dailycate
		$sql="select * from dailycate where name='$dailycate' and id!='$id' ";

	}


	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){

		$msg="Category already exists";

	}
	else{

		//if id is not set then insert new dailycate 
		if($id==""){
			mysqli_query($con,"insert into dailycate(name,description,status) values('$dailycate','$description',1) ");

		}
		else{
			//if id is set then update exsting dailycate
			mysqli_query($con,"update dailycate set name='$dailycate', description='$description' where id='$id'  ");
		}
		redirect('pages-listProCate.php');
		
	}
	
}






?>


			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Daily Products Categories</h1>
				
					</div>
					<hr>

					<?php 
					if(strlen( $msg ) > 0){
					?>
					<div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
					<?php
						}

					?>
					<form method="post">
				

					 	<div class="row">
								    <div class="col-sm-12 mb-3">
								     	<label for="catName" class="form-label">Name<span class="redStar">*</span></label>
								     	<input type="text" class="form-control" id="catName" name="dailycate" required autocomplete="off" value="<?php echo $dailycate; ?>">
								      		
								    </div>
						</div>

						<div class="row">
								    <div class="col-sm-12 mb-3">
								     	<label for="catDesc" class="form-label">Description </label>
							           <textarea class="form-control" rows="3" id="catDesc" name="description" autocomplete="off"  > <?php echo $description; ?> </textarea>
								      		
								    </div>
						</div>

						<input type="submit" name="submit" class="btn btn-success" value="Submit">
					</form>


							
				

				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
