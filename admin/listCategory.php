<?php

include ('top.php');

$sql="select * from category order by id desc";
$res=mysqli_query($con,$sql);


?>



			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Categories</h1>
					</div>
					<hr>
				<div class="container table-responsive">

					<table class="table table-striped  table-hover  table-sm pt-3" id="dttable">
					<thead class="table-primary">
						<tr>
						<th scope="col">Sr. No</th>
						<th scope="col">Category Name</th>
						<th scope="col">Description</th>
						<th scope="col">Actions</th>

						</tr>
					</thead>
					<tbody>

						<?php  

							if(mysqli_num_rows($res) > 0){
								$i=1;
								while( $row=mysqli_fetch_assoc($res) ){

						?>

						<tr>
						<td scope="col"> <?php  echo $i; ?></td>
						<td scope="col"> <?php  echo $row['name']; ?></td>
						<td scope="col" width="30%"> <?php  echo $row['description']; ?></td>
						<td scope="col">

							<a href="addCategory.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>


							<?php
								if( $row['status'] == 1 ){
							?>
							<a href="?id=<?php echo $row['id']; ?>&type=deactive "> <button class="btn btn-primary btn-sm">Active</button> </a>

							<?php

								}
								else
								{
							?>
							<a href="?id=<?php echo $row['id']; ?>&type=active "> <button class="btn btn-secondary btn-sm">Deactive</button> </a>

							<?php
								}

							?>
							
							<a href="?id=<?php echo $row['id']; ?>&type=delete "> <button class="btn btn-danger btn-sm">Delete</button> </a>


						</td>

						</tr>


						<?php
								$i++;

								}
							}
							else{
							?>
							<td colspan="4">Data not found</td>

							<?php

							}

						?>
						

						
						
					</tbody>

					</table>


				</div>



					
				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>


<?php


if( isset($_GET['type']) && $_GET['type']!==' '  &&  isset($_GET['id']) && $_GET['id'] > 0  )
{

	$type=$_GET['type'];
	$id=$_GET['id'];

	if( $type == 'delete')
	{
		 mysqli_query($con,"delete from category where id='$id' ");
		 redirect(SITE_PATH.'admin/listCategory');

	}

	if( $type=='active' || $type=='deactive'){
		$status=1;

		if($type=='deactive'){
			$status=0;
		}

		mysqli_query($con,"update category set status='$status' where id='$id' ");
		redirect(SITE_PATH.'admin/listCategory');

	}





}

?>