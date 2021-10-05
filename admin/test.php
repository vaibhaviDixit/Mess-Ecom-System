<?php 

if(isset($_POST['submit']))
{
	echo "<pre>";
	print_r($_FILES);
   
   if(!empty( $_FILES["file"]["name"] ) ){
   	echo "yes ";
   }
   else{
   	echo "no";
   }

}



 ?>


<form method="post" enctype="multipart/form-data">

	 <input type="file" name="file">
	 <input type="submit" name="submit" value="upload">
</form>
