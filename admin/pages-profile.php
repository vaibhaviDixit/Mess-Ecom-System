<?php

include ('top.php');


$sql="select * from admin";
$res=mysqli_query($con,$sql);

if(mysqli_num_rows($res)>0){
 $row=mysqli_fetch_assoc($res);
}else{
	$row=array();
}

									  			
 


if(isset($_POST['submit'])){
	

	
}


?>
			
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
					
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									
									<img src="img/pic-3.png" alt="admin" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0"><?php   echo $row['name']; ?></h5>

									<div class="social d-flex justify-content-evenly">
									    <a href=""> <i class="fab fa-facebook p-2"></i> </a>
						                <a href=""> <i class="fab fa-instagram p-2"></i></a>
						                <a href=""> <i class="fab fa-whatsapp p-2"></i></a>
									</div>

									<button class="btn btn-success btn-sm mt-3 p-1" ><span data-feather="key"></span> Change Password</button>
								</div>
								
								
								
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Basic Infromation</h5>
								</div>
				   				<div class="card-body text-center">

									<table class="table" style="text-align: left;">
									  <tbody>
									  	
									    <tr>
									      <th scope="row">Name</th>
									      <td><?php   echo $row['name']; ?></td>
									    </tr>
									   <tr>
									      <th scope="row">Email Address</th>
									      <td><?php   echo $row['email']; ?></td>
									    </tr>
									    <tr>
									      <th scope="row">Phone Number</th>
									      <td><?php   echo $row['phone']; ?></td>
									    </tr>
									    <tr>
									      <th scope="row">Website</th>
									      <td><a target="_blank" href=<?php echo $row['website']; ?> > <?php   echo $row['website']; ?> </a> </td>
									    </tr>
									     <tr>
									      <th scope="row">Location</th>
									      <td><?php   echo $row['address']; ?></td>
									    </tr>

									


									  </tbody>
									</table>
									

								</div>
							</div>

					
						</div>

					</div>

		<div class="col-md-8 col-xl-12">
			<div class="accordion accordion-flush" id="accordionFlushExample">

			  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingTwo">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
				        Edit Profile
				      </button>
				    </h2>
		        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
		            <div class="accordion-body">
		      	

		      		          <div class="card">
										
										<div class="card-body h-100">

												   <form method="post" id="adminFrom">
													  <div class="row">
														    <div class="col-sm-6 mb-3">
														    	<label for="adminName" class="form-label">Name</label>
														        <input type="text" class="form-control" id="adminName">
														    </div>
														    <div class="col-sm-6 mb-3">
														    	<label for="adminPhone" class="form-label">Phone</label>
														      <input type="text" class="form-control" id="adminPhone">
														    </div>
													   </div>

														<div class="row">
														    <div class="col mb-3">
														    	<label for="adminLocation" class="form-label">Location</label>
														      <textarea class="form-control" rows="3" id="adminLocation"></textarea>
														    </div>
													    </div>

													   <div class="row">
														     <div class="col-sm-6 mb-3">
														    	<label for="adminEmail" class="form-label">Email</label>
														        <input type="email" class="form-control" id="adminEmail">
														    </div>
														    <div class="col-sm-6 mb-3">
														    	<label for="adminWeb" class="form-label">Website</label>
														      <input type="text" class="form-control" id="adminWeb">
														    </div>
														</div>

														 <div class="row">
													  
														  		<label class="form-label">Social Links</label>
														  		<div class="col-sm-4 mb-3">
																	<i class="fab fa-facebook p-3"></i>
															        <input type="text" class="form-control">
														       </div>
														       <div class="col-sm-4 mb-3">
																	<i class="fab fa-instagram p-3"></i>
															        <input type="text" class="form-control">
														       </div>
														       <div class="col-sm-4 mb-3">
																	<i class="fab fa-whatsapp p-3"></i>
															        <input type="text" class="form-control">
														       </div>
							  							
														 </div>


													  <button class="btn btn-success" name="submit" type="submit">Save Changes</button>

												    </form>
										     </div>
									    </div> 
									    <!-- card ends -->

		      				</div>
		   		 </div>
		     </div>

</div>
<!--  -->




				
							
					</div>
					</div>

			
			</main>

			<?php

				include 'footer.php';

			?>
