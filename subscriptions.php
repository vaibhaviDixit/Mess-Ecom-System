<!-- nav -->
<?php

        include 'userNav.php';
?>
<!-- Page content holder -->
<div class="page-content pt-5" id="content">

	<div class="container d-flex justify-content-between align-items-center flex-wrap orderLists">

		<?php 
			$uid=$_SESSION['CURRENT_USER'];
			$runGetSubs=mysqli_query($con,"select * from onlinemembers where uid='$uid' and paymentStatus='success' order by joinDate DESC");
        if(mysqli_num_rows($runGetSubs)>0){

			while($SubsRow=mysqli_fetch_assoc($runGetSubs)){
				if($SubsRow['status']==1){
				$SubscriptionStatus=getSubscribeStatus(date('d-m-Y',strtotime($SubsRow['joinDate'])),$SubsRow['subDuration']);
				}
				else{
					$SubscriptionStatus="Not-Approved";
				}
		?>
		<div class="card fs-6 fw-bolder border-0 mx-auto userSubsCard mb-4">
			<div class="subBadge <?php echo $SubscriptionStatus; ?>"><?php echo $SubscriptionStatus; ?></div>
			<div class="d-flex justify-content-between p-3" style="background-color:#f0d78c; padding-top: 5rem !important;">
				<div>
					<dt><span class="text-muted">Subscription : </span><?php echo $SubsRow['subName'];  ?></dt>
					<dt><span class="text-muted">Duration : </span><?php echo $SubsRow['subDuration']."<br>"; 
						echo getSubscribeInterval(date('d-m-Y',strtotime($SubsRow['joinDate'])),$SubsRow['subDuration']);
					 ?> </dt>
				</div>
				<div>
				    <dt><span class="text-muted">Payment : </span>&#8377; <?php echo $SubsRow['price'];?></dt>
				    <dt><span class="text-muted">Address : </span><?php echo $SubsRow['address'];  ?></dt>
				</div>
			</div>
		</div>
		<!-- card ends -->
		<?php
			}
			// SubsRow ends
		} // main if ends
		else{
		?>
         <div class="mx-auto w-25 text-center" >
   			<img src="<?php echo SITE_PATH; ?>asset/images/nofav.png" class="img-fluid"><br>
   			<h3 class="text-center fw-bolder">No Subsriptions Yet!</h3>
		</div>
		<?php 
			}
		?>

	</div>
	<!-- container ends -->
    
</div>
<!-- ........... -->
</div>
<div>
<!-- End demo content -->
<!-- footer -->
<script type="text/javascript">
		$(".nav .nav-item ").removeClass("activeNavItem");
		$(".nav .subscriptionsNav").addClass("activeNavItem");
</script>
    <?php

        include 'footer.php';

    ?>
 