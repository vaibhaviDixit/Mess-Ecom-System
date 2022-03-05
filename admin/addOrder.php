<?php

include ('top.php');

$msg="";
$name="";
$phone="";
$address="";
$payment_type="";
$total=0;
$pay=0;
$remain=0;
$id="";


if(isset($_GET['id'])){
	$id=mysqli_real_escape_string( $con,htmlspecialchars( $_GET['id'] ) );


	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from offlineorders where orderId='$id' ") );

	$name=$row['name'];
	$phone=$row['phone'];
	$address=$row['address'];
	$payment_type=$row['payment_type'];
	$total=$row['total'];
	$pay=$row['paid'];
	$remain=$row['remain'];
	



}


if (isset($_POST['submit'])) {
    $orderId="#".substr(time(),4,6);

	$name=getSafeVal( $_POST['name'] );
	$phone=getSafeVal( $_POST['phone'] );
	$address=getSafeVal( $_POST['address'] );
	$payment_type=getSafeVal($_POST['payment_type']);
	$total=getSafeVal( $_POST['total'] );
	$pay=getSafeVal( $_POST['pay'] );
	$remain=getSafeVal( $_POST['remain']);

	$itemNames=getSafeArrVal( $_POST['itemNames']);
	$itemQty=getSafeArrVal( $_POST['itemQty']);
	$itemRate=getSafeArrVal( $_POST['itemRate']);
	$itemAmt=getSafeArrVal( $_POST['itemAmt']);

		//if id is not set then insert new order
		if($id==""){


				$run=mysqli_query($con,"INSERT INTO `offlineorders`(`name`,`orderId`, `phone`, `address`, `payment_type`, `total`, `order_status`, `paid`, `remain`) VALUES ('$name','$orderId','$phone','$address','$payment_type',$total,1,$pay,$remain)");
		

				if($run){
                    
                    for($m=0;$m<count($itemAmt);$m++){
                    	$proName=$itemNames[$m];
                    	$proQty=$itemQty[$m];
                    	$proRate=$itemRate[$m];
                    	$proTotal=$itemAmt[$m];

                       $runDetails=mysqli_query($con,"INSERT INTO `offorderdetails`(`orderId`, `name`, `qty`, `rate`, `total`) VALUES ('$orderId','$proName',$proQty,$proRate,$proTotal)");
                       
                    }
                    
                    if($runDetails){
                    	 
						echo '<script type="text/javascript">swal("Order Placed Successfully...","","success").then(function(){window.location.href="'.SITE_PATH.'admin/listOnlineOrders";});</script>';
                    }
					
				}
		}
		else{
			//if id is set then update exsting member

				$run=mysqli_query($con,"UPDATE `members` SET `name`='$memberName',`phone`='$memberPhone',`address`='$memberAddress',`joinDate`='$memberJoinDate',`subscription`='$memberSubscription',`duration`='$memberSubscriptionDuration',`totalAmount`='$totalAmount' $image_condition WHERE id='$id' ");

				if($run){
					redirect(SITE_PATH.'admin/listOnlineOrders');
				}
			
		}
		
		
	}
	

?>

			<main class="content">
				<div class="container-fluid p-4">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Manage Offline Orders</h1>
					</div>
					<hr>
				

					<form method="post" enctype="multipart/form-data" >
						  <div class="row">
							    <div class="col-sm-6 mb-3">
							    	<label class="form-label">Name<span class="redStar">*</span></label>
							        <input type="text" class="form-control" name="name" required value="<?php echo $name; ?>">
							    </div>
							    <div class="col-sm-6 mb-3">
							    	<label  class="form-label">Phone<span class="redStar">*</span></label>
							      <input type="text" class="form-control" name="phone" required value="<?php echo $phone; ?>">
							    </div>
							</div>

						<div class="row">
							    <div class="col mb-3">
							    	<label  class="form-label">Address<span class="redStar">*</span></label>
							      <textarea class="form-control"  name="address" required>
							      <?php echo $address; ?>
							      </textarea>
							    </div>
						  </div>

						  <div style="position: relative; left: 90%;">
						  	<button class="btn btn-sm btn-primary" type="button" onclick="addOrders()"><i class="mdi mdi-24px mdi-plus-circle"></i></button>
						  </div>
						  <div class="row">
                              
							  <div class="table-responsive">
								<table class="table table-striped table-borderless fs-5">
								  <thead>
								    <tr>
								      <th scope="col">Menu Item<span class="redStar">*</span></th>
								      <th scope="col">Quantity<span class="redStar">*</span></th>
								      <th scope="col">Rate<span class="redStar">*</span></th>
								      <th scope="col">Amount<span class="redStar">*</span></th>
								    </tr>
								  </thead>
								  <tbody class="orders">
								  	<?php

									    $detailsRow=mysqli_query($con,"select * from offorderdetails where orderId='$id' ");
									    
    								if(mysqli_num_rows($detailsRow)>0){
									    $itr=0;
									    while ($orderDet=mysqli_fetch_assoc($detailsRow)) {
									    	    $itemId=$orderDet['id'];
												$itemNames=$orderDet['name'];
												$itemQty=$orderDet['qty'];
												$itemRate=$orderDet['rate'];
												$itemAmt=$orderDet['total'];
												?>
									<tr id="addmenu_<?php echo $itemId; ?>" class="addOrder">
								      <td><input type="text" class="form-control" name="itemNames[]" required value="<?php echo $itemNames; ?>"></td>

								      <td><input type="number" min="1" max="10" class="form-control" name="itemQty[]" value="<?php echo $itemQty; ?>" onchange="qtyChange('itemQty_<?php echo $itemId; ?>')" id="itemQty_<?php echo $itemId; ?>" required></td>

								      <td><input type="number" min="1" class="form-control" name="itemRate[]" value="<?php echo $itemRate; ?>" onchange="itemRate('itemRate_<?php echo $itemId; ?>')" id="itemRate_<?php echo $itemId; ?>" required></td>

								      <td>
								      	<div class="row">
										  <div class="col-6">
										  	<input type="number" class="form-control" value="<?php echo $itemAmt; ?>" name="itemAmt[]" readonly id="itemAmt_<?php echo $itemId; ?>" required>
										  </div>
										   <div class="col-6">
										  	<a href="?id=<?php echo $itemId; ?>&type=delete" class="btn text-danger fs-4"><i class="mdi  mdi-delete-forever"></i></a>
										  </div>

										</div>
									  </td>
								    </tr>
												<?php

									    }


    								}
    								else{
    								?>
								    <tr id="addmenu_1" class="addOrder">
								      <td><input type="text" class="form-control" name="itemNames[]" required></td>

								      <td><input type="number" min="1" max="10" class="form-control" name="itemQty[]" value="1" onchange="qtyChange('itemQty_1')" id="itemQty_1" required></td>

								      <td><input type="number" class="form-control" name="itemRate[]" value="0" onchange="itemRate('itemRate_1')" id="itemRate_1" class="rate" required></td>

								      <td>
								      	<div class="row">
										  <div class="col-6">
										  	<input type="number" value="0" class="form-control" name="itemAmt[]" readonly id="itemAmt_1" required>
										  </div>

										</div>
									  </td>
								    </tr>
								    <?php		
    									}
								  	?>

								  </tbody>
								</table>
							  </div>

						  </div>
						  <div class="row">

						  	<div class="col-sm-3 mb-3">
						  		<label class="form-label">Payment Type<span class="redStar">*</span></label>
						  		<select name="payment_type" class="form-control">
						  			<option value="Cash">Cash</option>
						  			<option value="Online">Online Transfer</option>
						  		</select>
						  		
						  	</div>
						  	 <div class="col-sm-3 mb-3">
							    	<label class="form-label">Pay<span class="redStar">*</span></label>
							        <input type="number" class="form-control" name="pay" required value="<?php echo $pay; ?>" onchange="payAmount(this.value)" id="payAmt">
							 </div>

							 <div class="col-sm-3 mb-3">
							    	<label class="form-label">Remain<span class="redStar">*</span></label>
							        <input type="number" id="remainAmt" class="form-control" name="remain" required value="<?php echo $remain; ?>" readonly>
							 </div>

							 <div class="col-sm-3 mb-3">
							    	<label class="form-label">Total<span class="redStar">*</span></label>
							        <input type="text" class="form-control" name="total" required value="<?php echo $total; ?>" readonly id="totalAmt">
							 </div>

						  </div>

						  <input type="submit" name="submit" class="btn btn-success" value="Submit">

					</form>

				

				</div>
			</main>

		

			<?php

				include 'footer.php';

			?>
	<script type="text/javascript">



//change amount according to rate changes
function itemRate(e){
	rate=$("#"+e).val();
	if(parseInt(rate)<=0){
		$("#"+e).val(0);
        swal("Invalid Rate!!","","error");
	}
	
		ind=e.split("_")[1];
		qty=$("#itemQty_"+ind).val();
		console.log(qty+" "+ $("#"+e).val());
		value=parseInt(qty)*parseInt($("#"+e).val());
		$("#itemAmt_"+ind).val(value);

		calTotal();

}
function calTotal(){
	let navLinks = document.querySelectorAll('.addOrder');
        
        total=0;
		navLinks.forEach(order=>{
            let id = order.getAttribute('id').split("_")[1];
			amount=$("#itemAmt_"+id).val();
			total=total+parseInt(amount);	
			console.log(amount);
		});
		$("#totalAmt").val(total);
}
//quatity validation
		function qtyChange(quatity) {
			alert("exe");
			qt=$("#"+quatity).val();
			if(parseInt(qt)<=0 || parseInt(qt)>10){
                swal("Invalid Quantity!!","","error");
				$("#itemQty").val(1);
			}
			qtyId=quatity.split("_")[1];
			itemRate('itemRate_'+qtyId);


		}

//check if user paying value is not zero and not greater than total amount
       function payAmount(amt) {
       	    total=parseInt($("#totalAmt").val());
			if(parseInt(amt)<=0 || parseInt(amt)>total){
				$("#payAmt").val(0);
                swal("Invalid Payment Amount!!","","error");
			}
			$("#remainAmt").val(total-parseInt(amt));

		}
	   
	   let sr=2;

		function addOrders(){

			let html=`<tr id="addmenu_`+sr+`" class="addOrder">
								      <td><input type="text" class="form-control" name="itemNames[]" required></td>

								      <td><input type="number" min="1" max="10" class="form-control" name="itemQty[]" value="1" onchange="qtyChange('itemQty_`+sr+`')" id="itemQty_`+sr+`" required></td>

								      <td><input type="number" min="1" class="form-control" name="itemRate[]" value="0" onchange="itemRate('itemRate_`+sr+`')" id="itemRate_`+sr+`" required></td>

								      <td>
								      	<div class="row">
										  <div class="col-6">
										  	<input type="number" class="form-control" value="0" name="itemAmt[]" readonly id="itemAmt_`+sr+`" required>
										  </div>
										   <div class="col-6">
										  	<a href="javascript:void(0)" onclick="deleteRow(`+sr+`)" class="btn text-danger fs-4"><i class="mdi  mdi-delete-forever"></i></a>
										  </div>

										</div>
									  </td>
								    </tr>`;
			$(".orders").append(html);
			sr++;
		}

		function deleteRow(row){
			let id="#addmenu_"+row;
			$(id).remove();
			calTotal();

		}
	</script>
<?php
if( isset($_GET['type']) && $_GET['type']!==' '  &&  isset($_GET['id']) && $_GET['id'] > 0  )
{

	$type=$_GET['type'];
	$id=$_GET['id'];

	if( $type == 'delete')
	{
		 mysqli_query($con,"delete from offorderdetails where id='$id' ");
		 echo '<script type="text/javascript">window.location.href=window.location.href;</script>';


	}

}
?>









