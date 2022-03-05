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
		<div class="text-success">
			<h3 class="fw-bold ">Thank You!</h3>
			<h4 class="fw-bold ">Your order has been placed!</h4>
			<button class="btn btn-sm btn-outline-success fw-bold"><i class="fas fa-download"></i> Order Receipt</button>
		</div>
		<div>
			<img width="200" height="200" src="<?php echo SITE_PATH; ?>asset/img/tick.gif" class="img-fluid">
		</div>
	</div>
	
</section>

<?php

include 'footer.php';

?>