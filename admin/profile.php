<?php

include ('top.php');


$sql="select * from admin";
$res=mysqli_query($con,$sql);

if(mysqli_num_rows($res)>0){
 $row=mysqli_fetch_assoc($res);
}else{
	$row=array();
}

//update admin profile
if(isset($_POST['submit'])){
	
	$adminName=$_POST['adminName'];
    $adminPhone=$_POST['adminPhone'];
    $adminLocation=$_POST['adminLocation'];
 	$adminEmail=$_POST['adminEmail'];
    $adminWeb=$_POST['adminWeb'];
    $adminFb=$_POST['adminFb'];
    $adminInsta =$_POST['adminInsta'];
    $adminWh=$_POST['adminWh'];

    mysqli_query($con,"update `admin` set `name`='$adminName', `email`='$adminEmail', `phone`='$adminPhone', `address`='$adminLocation', `fb`='$adminFb', `insta`='$adminInsta', `whatsapp`='$adminWh', `website`='$adminWeb' ");
    ?>

    	<script type="text/javascript"></script>
    <?php

	
}

if(isset($_FILES['adminProfile'])){

  $type=$_FILES['adminProfile']['type'];

  if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
         unset($_FILES['adminProfile']);
         echo '<script type="text/javascript">swal("Invalid image format..!","","error").then(function(){window.location.href=window.location.href;});</script>';
      }
      else{

        $adminProfile=rand(111111111,999999999).'_'.$_FILES['adminProfile']['name'];
        move_uploaded_file($_FILES['adminProfile']['tmp_name'],SERVER_PROFILE_IMAGE.$adminProfile);
        mysqli_query($con,"update admin set profile='$adminProfile'");
        
           
        redirect(SITE_PATH.'admin/profile');

      }

  
}


?>
			
			<main class="content">
				<div class="container-fluid p-4">

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

									 <a target="_blank" href="<?php echo SITE_PROFILE_IMAGE.$row['profile']; ?>">
                   						 <img src="<?php  echo SITE_PROFILE_IMAGE.$row['profile']; ?>" alt="user" class="img-fluid  mb-2 img-thumbnail" />
                  					</a>
									<h5 class="card-title mb-0"><?php   echo $row['name']; ?></h5>


									 <form method="post" enctype="multipart/form-data">
									 	<label type="button" for="adminProfile" class="badge btn btn-primary btn-sm mt-2 rounded-pill">Change Profile <i class="fas fa-greater-than"></i></label>
					                    <input class="form-control form-control-sm" type="file" id="adminProfile" name="adminProfile" accept="image/*" onchange="this.form.submit();" hidden>
					                     
                  					</form>

									<div class="social d-flex justify-content-evenly">
									    <a target="_blank" href=<?php echo $row['fb']; ?>> <i class="fab fa-facebook p-2"></i> </a>
						                <a target="_blank" href=<?php echo $row['insta']; ?> > <i class="fab fa-instagram p-2"></i></a>
						                <a target="_blank" href="https://wa.me/+91<?php echo $row['whatsapp']; ?>"> <i class="fab fa-whatsapp p-2"></i></a>
									</div>


									<button class="btn btn-success btn-sm mt-3 rounded-pill" ><span data-feather="key"></span> Change Password <i class="fas fa-key"></i></button>

								</div>
							
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0 fs-5">Basic Infromation</h5>
								</div>
				   				<div class="card-body text-center">

									<table class="table fs-6" style="text-align: left;">
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

		<div class="col-12">
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
														        <input type="text" class="form-control" name="adminName" id="adminName" value="<?php   echo $row['name']; ?>">
														    </div>
														    <div class="col-sm-6 mb-3">
														    	<label for="adminPhone" class="form-label">Phone</label>
														      <input type="text" class="form-control" name="adminPhone" id="adminPhone" value="<?php   echo $row['phone']; ?>">
														    </div>
													   </div>

														<div class="row">
														    <div class="col mb-3">
														    	<label for="adminLocation" class="form-label">Location</label>
														      <textarea class="form-control" rows="3" id="adminLocation" name="adminLocation">
														      	<?php   echo $row['address']; ?>
														      </textarea>
														    </div>
													    </div>

													   <div class="row">
														     <div class="col-sm-6 mb-3">
														    	<label for="adminEmail" class="form-label">Email</label>
														        <input type="email" class="form-control" id="adminEmail" name="adminEmail" value="<?php   echo $row['email']; ?>">
														    </div>
														    <div class="col-sm-6 mb-3">
														    	<label for="adminWeb" class="form-label">Website</label>
														      <input type="text" class="form-control" id="adminWeb" name="adminWeb" value="<?php   echo $row['website']; ?>">
														    </div>
														</div>

														 <div class="row">
													  
														  		<label class="form-label">Social Links</label>
														  		<div class="col-sm-4 mb-3">
																	<i class="fab fa-facebook p-3"></i>
															        <input type="text" class="form-control" name="adminFb"  value="<?php   echo $row['fb']; ?>">
														       </div>
														       <div class="col-sm-4 mb-3">
																	<i class="fab fa-instagram p-3"></i>
															        <input type="text" class="form-control" name="adminInsta" value="<?php   echo $row['insta']; ?>">
														       </div>
														       <div class="col-sm-4 mb-3">
																	<i class="fab fa-whatsapp p-3"></i>
															        <input type="text" class="form-control" name="adminWh" value="<?php   echo $row['whatsapp']; ?>">
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
