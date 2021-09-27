<?php

session_start();

if(isset($_POST['login'])){

	$email=$_POST['loginemail'];
	$pass=$_POST['loginpassword'];

	if ($email=="vaibhavi@gmail.com" && $pass=="1234") {

		  $_SESSION['CURRENT_USER']=$email;
		?>
       <script type="text/javascript">
       	// alert("Valid");
       	window.location.href='index.php';

       </script>
		
		<?php
	}
	else{
			?>
	
     <script type="text/javascript">window.location.href='index.php';</script>
		
		<?php

	}
}



?>