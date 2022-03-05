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
			<h3 class="text-danger fw-bold fs-5">Something went wrong...</h3>
			<h4>Try again please</h4>
		</div>
		<div>
			<img width="200" height="200" src="<?php echo SITE_PATH; ?>asset/img/error.gif" class="img-fluid">
		</div>
	</div>
	


</section>

<?php

include 'footer.php';

?>