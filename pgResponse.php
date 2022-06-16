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

$paytmChecksum = "";
$paramList = array();
$paramList=$_POST;
$isValidChecksum = "FALSE";
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 

//Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.

$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br/>";
		if(str_starts_with($_POST['ORDERID'], 'MESSECOM')){
			$oid=$_POST['ORDERID'];
			$payId=$_POST['TXNID'];
			$uid=explode("_", $oid)[1];
			if(!isset($_SESSION['CURRENT_USER'])){
					$_SESSION['CURRENT_USER']=$uid;
			}
			
			$updateSuc=mysqli_query($con,"update onlinemembers set `paymentId`='$payId', `paymentStatus`='success' where orderId='$oid' and uid='$uid' ");
			if($updateSuc)
			{
				
				redirect(SITE_PATH."success");
			}
		}

		if(str_starts_with($_POST['ORDERID'], 'MESSORDER')){
			$oid=$_POST['ORDERID'];
			$uid=explode("_", $oid)[1];

			if(!isset($_SESSION['CURRENT_USER'])){
					$_SESSION['CURRENT_USER']=$uid;
			}
			$updateOrderSuc=mysqli_query($con,"update orders set `payment_status`='success' where orderId='$oid' and userId='$uid' ");

			if($updateOrderSuc)
			{
				emptyCart($uid);
				redirect(SITE_PATH."orderSuccess");
			}
		}

	}
	else {
		redirect(SITE_PATH."failTxn");
	}


}
else {
	redirect(SITE_PATH."failTxn");
	//Process transaction as suspicious.
}

?>