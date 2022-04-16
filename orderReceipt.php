<?php 
session_start();
ob_start();
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');

if(isset($_SESSION['CURRENT_USER']) || isset($_SESSION['adminLogin'])){

}
else{
     redirect(SITE_PATH);
}
require_once __DIR__ . '/pdf/autoload.php';

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

		 $uid=$_SESSION['CURRENT_USER'];
     $userDetails=getUserDetails();
		 $res=mysqli_query($con,"select * from orders where orderId='$orderID' and userId='$uid' ");

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
  	<b>Name: </b>'.$userDetails['name'].'<br>
  	<b>Phone: </b>'.$orderDetails['phone'].'<br>
  	<b>Address: </b>'.$orderDetails['address'].', '.$orderDetails['pincode'].' <br>
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

 $orderItems=mysqli_query($con,"select * from orderdetails where orderId='$orderID' and uid='$uid' ");
$sr=1;
   while($ordRow=mysqli_fetch_assoc($orderItems)){

					if($ordRow['product_type']=="meal"){
                        $id=$ordRow['product_id'];
                         $mealsSql="select * from meals where id='$id'";
                         $meals=mysqli_query($con,$mealsSql);
                         $meals_row=mysqli_fetch_assoc($meals);  
                         $html.='<tr>
							      <th scope="row">'.$sr.'</th>
							      <td>'.$meals_row['mealName'].'</td>
							      <td>'.$ordRow['product_qty'].'</td>
							      <td>'.$meals_row['mealPrice'].'</td>
							      <td>'.$ordRow['price'].'</td>
							    </tr>';

                  $sr=$sr+1;
                         
          }

                    if($ordRow['product_type']=="daily"){
                        $id=$ordRow['product_id'];
                         $dailySql="select * from dailyproducts where id='$id'";
                         $daily=mysqli_query($con,$dailySql);
                         $dailyRow=mysqli_fetch_assoc($daily);
                         $html.='<tr>
							      <th scope="row">'.$sr.'</th>
							      <td>'.$dailyRow['proName'].'</td>
							      <td>'.$ordRow['product_qty'].'</td>
							      <td>'.$dailyRow['proPrice'].'</td>
							      <td>'.$ordRow['price'].'</td>
							    </tr>';

                  $sr=$sr+1;
                        
                    }

                    if($ordRow['product_type']=="menu"){
                        $id=$ordRow['product_id'];
                         $menuSql="select * from menu where id='$id'";
                         $menu=mysqli_query($con,$menuSql);
                         $menuRow=mysqli_fetch_assoc($menu);

                          $html.='<tr>
							      <th scope="row">'.$sr.'</th>
							      <td>'.$menuRow['menuName'].'</td>
							      <td>'.$ordRow['product_qty'].'</td>
							      <td>'.$menuRow['menuPrice'].'</td>
							      <td>'.$ordRow['price'].'</td>
							    </tr>';
                         
                  $sr=$sr+1;
                    }
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


// $mpdf->Output('test.pdf','F');
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