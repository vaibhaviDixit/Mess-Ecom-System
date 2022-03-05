<?php

include ('top.php');
//join two tables menu and category ,select category name based on equality of category id
$sql="select menu.*, category.name from menu,category where menu.category_id=category.id ";
$res=mysqli_query($con,$sql);

?>

			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Menu items</h1>
					</div>
					<hr>
				<div class="container table-responsive">

					<table class="table table-striped  table-hover table-sm pt-3 " id="dttable">
					<thead class="table-primary">
						<tr>
						<th scope="col">Sr. No</th>
						<th scope="col">Name</th>
						<th scope="col" width="10%">Photo</th>
						<th scope="col">Description</th>
						<th scope="col">Category</th>
						<th scope="col">Price</th>
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
						<td scope="col"> <?php  echo $row['menuName']; ?></td>
						<td scope="col"><a target="_blank" href="<?php  echo SITE_MENU_IMAGE.$row['menuPhoto']; ?>"> <img class="img-fluid" src="<?php  echo SITE_MENU_IMAGE.$row['menuPhoto']; ?>" > </a></td>
						<td scope="col"> <?php  echo $row['menuDesc']; ?></td>
						<td scope="col"> <?php  echo $row['name']; ?></td>
						<td scope="col"> <?php  echo $row['menuPrice']; ?></td>
						<td scope="col">

							<a href="addMenu/<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>


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
							
							<a href="?id=<?php echo $row['id']; ?>&type=delete"> <button class="btn btn-danger btn-sm">Delete</button> </a>


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
		 mysqli_query($con,"delete from menu where id='$id' ");
		 redirect(SITE_PATH.'admin/listMenu');


	}

	if( $type=='active' || $type=='deactive'){
		$status=1;

		if($type=='deactive'){
			$status=0;
		}

		mysqli_query($con,"update menu set status='$status' where id='$id' ");
		redirect(SITE_PATH.'admin/listMenu');

	}





}

?>