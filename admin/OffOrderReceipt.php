<?php 
session_start();
ob_start();
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/pdf/autoload.php');

if(isset($_SESSION['adminLogin'])){
}
else{
     redirect(SITE_PATH);
}

$css=file_get_contents(SITE_PATH.'asset/css/bootstrap.min.css');

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp','debug' => true,'allow_output_buffering' => true]);

if(isset($_GET['id'])){
 
$orderID=$_GET['id'];

$html='<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
	</style>
</head>
<body>
		<div class="text-center">
			<h1>Fork Fresh</h1>
			<p>Shilavihar, Pipeline Road, Ahmednagar - 414003, Shriram Chowk</p>
			
		</div>';

		 $res=mysqli_query($con,"select * from offlineorders where orderId='$orderID'");
		 if(mysqli_num_rows($res) > 0){
		 	$orderDetails=mysqli_fetch_assoc($res);
     }

		  	$html.='  <div class="container">
  	<div>
	  	<b>INVOICE &nbsp;&nbsp;&nbsp;'.$orderDetails['id'].'</b>
  	</div><br>
  <h5>Receiver:</h5>
  <br>
  <div>
  	<b>Name: </b>'.$orderDetails['name'].'<br>
  	<b>Phone: </b>'.$orderDetails['phone'].'<br>
  	<b>Address: </b>'.$orderDetails['address'].'<br>
  	<b>Payment Type: </b>'.$orderDetails['payment_type'].'<br>
  	<b>Date: </b>'.myDate($orderDetails['addedOn']).'<br>
  </div><br><br>

  <table class="table table-striped table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Description</th>
      <th scope="col">Qty</th>
      <th scope="col">Unit Cost</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>';

 $orderItems=mysqli_query($con,"select * from offorderdetails where orderId='$orderID'");
$sr=1;
   while($ordRow=mysqli_fetch_assoc($orderItems)){

		 
                    $html.='<tr>
							      <th scope="row">'.$sr.'</th>
							      <td>'.$ordRow['name'].'</td>
							      <td>'.$ordRow['qty'].'</td>
							      <td>'.$ordRow['rate'].'</td>
							      <td>'.$ordRow['total'].'</td>
							    </tr>';

                  $sr=$sr+1;
                        
                }
			$html.='<hr>
      <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td>Total Cost</td>
      <td colspan="4">'.$orderDetails['total'].'</td>
    </tr>';

			}


  $html.='</tbody>
</table>
  </div>
</body>
</html>';


try {
  ob_end_clean();
  $mpdf->debug = true;
	$mpdf->writeHTML($css,1);//first load css in dom
	$mpdf->writeHTML($html);
	$mpdf->Output();
} catch (\Mpdf\MpdfException $e) { 
        echo $e->getMessage();
      }


ob_end_flush(); 
?>