<?php

include ('top.php');
$sql="select onlinemembers.*,user.name,user.pushtoken from onlinemembers,user where onlinemembers.uid=user.id and onlinemembers.paymentStatus='success' order by id desc ";
$res=mysqli_query($con,$sql);

?>
			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Online Members</h1>
					</div>
					<hr>

				<div class="container table-responsive">

					<table class="table table-striped  table-hover table-sm pt-3" id="dttable">
					<thead class="table-primary">
						<tr>
							<th scope="col">Sr No.</th>
							<th scope="col">Status</th>
							<th scope="col">Name</th>
							<th scope="col">Phone</th>
							<th scope="col">Address</th>
							<th scope="col">Date</th>
							<th scope="col">Subscription</th>
							<th scope="col">Duration</th>
							<th scope="col">Adhar</th>
							<th scope="col">PAN</th>
							<th scope="col">Photo</th>
							<th scope="col">Total</th>

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
						<td scope="col"> 
						<?php  
						   $planid=$row['id'];
						   $pushtoken=$row['pushtoken'];
							if($row['status']==0){
						    ?>
						    <button class="btn badge rounded-pill bg-danger" onclick="approvePlan('<?php echo $planid; ?>','<?php echo $pushtoken; ?>' )">Not Approved</button>
						    <?php
							} 
							else{

								echo '<button class="btn badge rounded-pill bg-primary">Approved</button>';
							}

						?>	
						</td>
						<td scope="col"> <?php  echo $row['name']; ?></td>
						<td scope="col"> <?php  echo $row['phone']; ?></td>
						<td scope="col"> <?php  echo $row['address']; ?></td>
						<td scope="col"> <?php 

						 echo getSubscribeInterval(date('d-m-Y',strtotime($row['joinDate'])),$row['subDuration']);

						  ?></td>
						<td scope="col"> <?php  echo $row['subName']; ?></td>
						<td scope="col"> <?php  echo $row['subDuration']; ?></td>
						<td scope="col" width="10%"> 
								<a target="_blank" href="<?php  echo SITE_DOC_IMAGE.$row['adhar']; ?>"> <img class="img-fluid" src="<?php  echo SITE_DOC_IMAGE.$row['adhar']; ?>" > </a> 
						</td>

						<td scope="col" width="10%"> <a target="_blank" href="<?php  echo SITE_DOC_IMAGE.$row['pan']; ?>"> <img class="img-fluid" src="<?php  echo SITE_DOC_IMAGE.$row['pan']; ?>" > </a> </td>

						<td scope="col" width="10%"> <a target="_blank" href="<?php  echo SITE_DOC_IMAGE.$row['photo']; ?>"> <img class="img-fluid" src="<?php  echo SITE_DOC_IMAGE.$row['photo']; ?>" > </a> </td>

						<td scope="col"> <?php  echo $row['price']; ?></td>

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

	<script type="text/javascript">
		function approvePlan(planid,pushtoken){
			console.log(pushtoken)

  			swal({
				  title: "Are you sure?",
				  text: "Once approved, you will not be able to cancel subscription!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((approve) => {
				  if (approve) {
				    jQuery.ajax({
				    	type:'post',
				    	url:'approvePlan',
				    	data:"planid="+planid,
				    	success:function(result){
				    		
				    		if(result){
				    			swal("Approved successfully!", {
						      		icon: "success",
						    	});
						    	
						    	sendPushNoti("Meal Subscription","Your Meal Subscription is Approved",pushtoken);
						    	window.location.href=window.location.href;

				    		}else{
				    			swal("Not Approved!","","error");
				    		}
				    		
				    	}

				    })
				  }else {
				    swal("Not Approved!","","error");
				  }
			});
		}
	</script>	

			<?php

				include 'footer.php';

			?>
	