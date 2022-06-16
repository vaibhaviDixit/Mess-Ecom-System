<?php

include ('top.php');

$sql="select dailyproducts.*,dailycate.name from dailyproducts,dailycate  where dailyproducts.proCate=dailycate.id order by dailyproducts.id desc";
$res=mysqli_query($con,$sql);

?>

			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Daily Products</h1>
					</div>
					<hr>

				<div class="container table-responsive">

					<table class="table table-striped   table-hover  table-sm pt-3" id="dttable">
					<thead class="table-primary">
						<tr>

						<th scope="col">Sr No.</th>
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col">Photo</th>
						<th scope="col">Price</th>
						<th scope="col">Category</th>
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
						<td scope="col" > <?php  echo $row['proName']; ?></td>
						<td scope="col" > <?php  echo $row['proDesc']; ?></td>
						<td scope="col" width="20%" > <a target="_blank" href="<?php  echo SITE_MENU_IMAGE.$row['proPhoto']; ?>"> <img class="img-fluid" src="<?php  echo SITE_MENU_IMAGE.$row['proPhoto']; ?>" > </a> </td>

						<td scope="col" > <?php  echo $row['proPrice']; ?></td>
						<td scope="col" > <?php  echo $row['name']; ?></td>
						<td scope="col" >

							<a href="pages-addDailyPro.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>
							
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
					 mysqli_query($con,"delete from dailyproducts where id='$id' ");
					 redirect(SITE_PATH.'admin/listDailyPro');

				}




			}

?>
