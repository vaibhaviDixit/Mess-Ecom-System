<?php

//print array
function printArray($arr){
	echo "<pre>";
	print_r($arr);
}


function redirect($link){
?>
<script type="text/javascript">
	
	window.location.href='<?php echo $link; ?>'
</script>
<?php
	die();
}



?>