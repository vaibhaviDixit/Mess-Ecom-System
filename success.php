<?php
include 'nav.php';

if(isset($_SESSION['CURRENT_USER'])){


}
else{
	redirect(SITE_PATH);
}
?>

<section style="padding-top: 5rem !important; height: 60vh;">

	<div class="container pt-5 d-flex justify-content-center align-items-center">
		<div>
		<h3 class="fs-5 fw-bold ">Thank You!</h3>
		<h4 class="fw-bold text-success">Your subscription is successful!</h4>
		<small class="fw-bold">You will get confirmation acknowledgement shortly!</small>
		</div>
		<div>
			<img width="200" height="200" src="<?php echo SITE_PATH; ?>asset/img/tick.gif" class="img-fluid">
		</div>
	</div>
	


</section>



<?php

include 'footer.php';

?>