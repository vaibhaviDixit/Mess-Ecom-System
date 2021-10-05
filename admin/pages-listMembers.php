<?php

include ('top.php');
$sql="select members.*, subscriptions.subscriptionName from members,subscriptions  where members.subscription=subscriptions.id ";
$res=mysqli_query($con,$sql);

?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Members</h1>
					</div>
					<hr>

				<div class="container table-responsive">

					<table class="table table-striped  table-hover table-sm pt-3" id="dttable">
					<thead class="table-primary">
						<tr>
							<th scope="col">Sr No.</th>
							<th scope="col">Member Name</th>
							<th scope="col">Member Phone</th>
							<th scope="col">Member Address</th>
							<th scope="col">Join Date</th>
							<th scope="col">Subscription Type</th>
							<th scope="col">Subscription Duration</th>
							<th scope="col">Adhar</th>
							<th scope="col">PAN</th>
							<th scope="col">Photo</th>
							<th scope="col">Total Amount</th>
							<th scope="col">Amount Paid</th>
							<th scope="col">Amount Left</th>
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
						<td scope="col"> <?php  echo $row['phone']; ?></td>
						<td scope="col"> <?php  echo $row['address']; ?></td>
						<td scope="col"> <?php 

						 echo $row['joinDate'];

						  ?></td>
						<td scope="col"> <?php  echo $row['subscriptionName']; ?></td>
						<td scope="col"> <?php  echo $row['duration']; ?></td>
						<td scope="col" width="10%"> <?php  
							if(SITE_DOC_IMAGE.$row['adhar']==""){
								echo "NA";
							}else{
								?>
								<a target="_blank" href="<?php  echo SITE_DOC_IMAGE.$row['adhar']; ?>"> <img class="img-fluid" src="<?php  echo SITE_DOC_IMAGE.$row['adhar']; ?>" > </a> 
								<?php

							}

						?> </td>

						<td scope="col" width="10%"> <a target="_blank" href="<?php  echo SITE_DOC_IMAGE.$row['pan']; ?>"> <img class="img-fluid" src="<?php  echo SITE_DOC_IMAGE.$row['pan']; ?>" > </a> </td>

						<td scope="col" width="10%"> <a target="_blank" href="<?php  echo SITE_DOC_IMAGE.$row['photo']; ?>"> <img class="img-fluid" src="<?php  echo SITE_DOC_IMAGE.$row['photo']; ?>" > </a> </td>

						<td scope="col"> <?php  echo $row['totalAmount']; ?></td>
						<td scope="col"> <?php  echo $row['paidAmount']; ?></td>
						<td scope="col"> <?php  echo $row['totalAmount']-$row['paidAmount']; ?></td>
						<td scope="col">

							<a href="pages-addMembers.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>
							
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
		 mysqli_query($con,"delete from members where id='$id' ");
		 redirect('pages-listMembers.php');

	}




}

?>