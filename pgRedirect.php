<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');

$cart_array=getFullCart();

$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$PAYFOR=$_POST["PAYFOR"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;


$paramList["CALLBACK_URL"] = SITE_PATH."pgResponse";

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
// printArray($_POST);
 
?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
			<!--  -->
		<table border="1">
			<tbody>

			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum;?>">

			</tbody>
		</table>
	</form>
</body>
</html>
<?php
if($PAYFOR=="TIFFINCHECKOUT"){
    
        $UserPhone = $_POST["userPhone"];
        $UserAddress = $_POST["userAddress"];
        $subName=$_POST["subName"];
        $subDuration=$_POST["subDuration"];

        $image_condition = "";
        $blank = "NA";

        if ($_FILES['adhar']['name'] != "")
        {
            $adharType = $_FILES['adhar']['type'];

            if ($adharType != "image/jpeg" && $adharType != "image/png" && $adharType != "image/jpg" && $adharType != "application/pdf")
            {
                $msg = "Invalid image format";
            }
            else
            {

                $adhar = rand(111111111, 999999999) . '_' . $_FILES['adhar']['name'];
                move_uploaded_file($_FILES['adhar']['tmp_name'], SERVER_DOC_IMAGE . $adhar);
                $image_condition = $image_condition . ",'$adhar' ";

            }

        }
        else
        {
            $image_condition = $image_condition . ",'$blank' ";
        }

        if ($_FILES['pan']['name'] != "")
        {

            $panType = $_FILES['pan']['type'];

            if ($panType != "image/jpeg" && $panType != "image/png" && $panType != "image/jpg" && $panType != "application/pdf")
            {
                $msg = "Invalid image format";
            }
            else
            {
                $pan = rand(111111111, 999999999) . '_' . $_FILES['pan']['name'];
                move_uploaded_file($_FILES['pan']['tmp_name'], SERVER_DOC_IMAGE . $pan);
                $image_condition = $image_condition . ",'$pan' ";
            }

        }
        else
        {
            $image_condition = $image_condition . ",'$blank' ";
        }

        if ($_FILES['photo']['name'] != "")
        {
            $photoType = $_FILES['photo']['type'];
            if ($photoType != "image/jpeg" && $photoType != "image/png" && $photoType != "image/jpg" && $photoType != "application/pdf")
            {
                $msg = "Invalid image format";
            }
            else
            {
                $photo = rand(111111111, 999999999) . '_' . $_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'], SERVER_DOC_IMAGE . $photo);
                $image_condition = $image_condition . ",'$photo' ";
            }
        }
        else
        {
            $image_condition = $image_condition . ",'$blank' ";
        }


    $uid=explode("_", $CUST_ID)[1];

$q=mysqli_query($con,"INSERT INTO `onlinemembers`(`orderId`, `uid`, `phone`, `address`, `subName`, `subDuration`, `price`, `paymentStatus`,`adhar`, `pan`, `photo`) VALUES ('$ORDER_ID','$uid','$UserPhone','$UserAddress','$subName','$subDuration','$TXN_AMOUNT','pending' $image_condition)");


if($q){
?>
    <script type="text/javascript">
            document.f1.submit();
    </script>
<?php
}

}
if($PAYFOR=="ORDERCHECKOUT"){

     $userAddress= getSafeVal($_POST['userAddress']);
     $userPhone= getSafeVal($_POST['userPhone']);
     $userPIN= getSafeVal($_POST['userPIN']);
     $uid=explode("_", $CUST_ID)[1];

     $run_order_online=mysqli_query($con,"INSERT INTO `orders`(`orderId`, `userId`,`phone`,`address`, `pincode`, `payment_type`, `total`, `order_status`, `payment_status`) VALUES ('$ORDER_ID','$uid','$userPhone','$userAddress','$userPIN','online','$TXN_AMOUNT','1','pending')");

          foreach ($cart_array as $key => $value) {
          
            $product_id=$value['id'];
            $product_type=$value['mealType'];
            $product_qty=$value['qty'];
            $price=$value['subtotal'];

            $run_orderDetails_online=mysqli_query($con,"INSERT INTO `orderdetails`(`orderId`,`uid`,`product_id`, `product_type`, `product_qty`, `price`) VALUES ('$ORDER_ID','$uid','$product_id','$product_type','$product_qty','$price')");
          }
          
          if($run_order_online && $run_orderDetails_online){
          
?>
    <script type="text/javascript">
            document.f1.submit();
    </script>
<?php
}
}
?>