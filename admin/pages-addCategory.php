
<?php


include ('top.php');

$msg="";
$category="";
$description="";
$id="";




if(isset($_GET['id']) && $_GET['id']>0){
	$id=mysqli_real_escape_string( $con,htmlspecialchars( $_GET['id'] ) );


	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from category where id='$id' ") );
	$category=$row['name'];
	$description=$row['description'];

}


if (isset($_POST['submit'])) {
	$category=mysqli_real_escape_string( $con,htmlspecialchars( $_POST['category'] ) );
	$description=mysqli_real_escape_string($con, htmlspecialchars( $_POST['description'] ) );
 

	if($id==""){
		//here id is blank means admin wants to add new category
		$sql="select * from category where name='$category' ";

	}
	else{
		//here id is set means admin wants to edit existing category
		$sql="select * from category where name='$category' and id!='$id' ";

	}


	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){

		$msg="Category already exists";

	}
	else{

		//if id is not set then insert new category 
		if($id==""){
			mysqli_query($con,"insert into category(name,description,status) values('$category','$description',1) ");

		}
		else{
			//if id is set then update exsting category
			mysqli_query($con,"update category set name='$category', description='$description' where id='$id'  ");
		}
		redirect('pages-listCategory.php');
		
	}
	
}






?>


			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Category</h1>
				
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
								     	<label for="catName" class="form-label">Category Name<span class="redStar">*</span></label>
								     	<input type="text" class="form-control" id="catName" name="category" required autocomplete="off" value="<?php echo $category; ?>">
								      		
								    </div>
						</div>

						<div class="row">
								    <div class="col-sm-12 mb-3">
								     	<label for="catDesc" class="form-label">Description of Category</label>
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
