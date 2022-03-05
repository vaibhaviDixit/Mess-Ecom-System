<!-- nav -->
<?php

        include 'userNav.php';
?>
<!-- Page content holder -->
<div class="page-content pt-5" id="content">

	<div class="container d-flex justify-content-between align-items-center orderLists">

		<?php 
			$uid=$_SESSION['CURRENT_USER'];
			$runGetOrders=mysqli_query($con,"select orders.*,orderstatus.name as orderStatus,orderstatus.id as statusId from orders,orderstatus where orders.userId='$uid' and orders.payment_status='success' and orders.order_status=orderstatus.id");
			if(mysqli_num_rows($runGetOrders)>0){
			while($OrderRow=mysqli_fetch_assoc($runGetOrders)){

			 $orderID=$OrderRow['orderId'];
			 $orderDetails=mysqli_query($con,"select * from orderdetails where orderId='$orderID' and uid='$uid' ");
		?>
		<div class="card w-100 fs-6 fw-bolder border-0">
			<div class="d-flex justify-content-between p-3" style="background-color: #e0ffcd;">
				<div>
					<span>ORDER ID: <?php echo $OrderRow['id'];  ?></span><br>
					<span class="text-muted"><?php echo myDate($OrderRow['addedOn']); ?></span>
				</div>
				<div>
				    <dt class="orderMark"><button class="badge rounded-pill fs-6 <?php echo $OrderRow['orderStatus']; ?> "><?php  echo $OrderRow['orderStatus'];
                    ?></button>

                    <?php 
                        // if($OrderRow['statusId']==5){
                     ?>
                            <a target="_blank" href="<?php echo SITE_PATH.'orderReceipt/'.$OrderRow['orderId']; ?>"><button class='btn btn-sm btn-success'><i class='fas fa-download'></i></button></a>
                    <?php
                        // }
                    ?>

                </dt>

				    <span><?php echo $OrderRow['address'].' , PIN - '.$OrderRow['pincode'];  ?></span>
				</div>
			</div>
			<div class="d-flex justify-content-between border-top p-3 flex-wrap" style="background-color: #ffb5b5;">
				<dt><span  class="text-muted">Ordered:</span><span> <?php echo mysqli_num_rows($orderDetails); ?> Items</span></dt>
				<dt><span  class="text-muted">Payment:</span><span> &#8377; <?php echo $OrderRow['total'];?></span></dt>
				<dt> <?php echo $OrderRow['payment_type'];  ?>
					<div class="d-flex align-items-start" style="color: #113f67;">
				   		<button class="p-1 bg-transparent text-success fw-bolder dropdown-toggle orderSumryModalToggle">See Order Details</button>
					</div>
				</dt>
			</div>
			<!-- modal -->
			<div class="border-top p-3  orderSumry orderSumryModal " style="background-color: #ffb5b5; display: none;">
				<?php
				   while($ordRow=mysqli_fetch_assoc($orderDetails)){

					if($ordRow['product_type']=="meal"){
                        $id=$ordRow['product_id'];
                         $mealsSql="select * from meals where id='$id'";
                         $meals=mysqli_query($con,$mealsSql);
                         while ($meals_row=mysqli_fetch_assoc($meals) ){
                            ?>
                             <div class="product">
                                <div class="cartimg">
                                    <img src="<?php echo SITE_MENU_IMAGE.$meals_row['mealPhoto'];  ?>" alt="" class="img-fluid rounded ">
                                </div>
                                <div class="cartProDesc">
                                  <b class="product-name"><?php echo $meals_row['mealName'];  ?></b><br>
                                        <span class="product-price">&#8377;<?php echo $meals_row['mealPrice'];?> x <?php echo $ordRow['product_qty'];  ?> = <?php echo $ordRow['price'];  ?></span>
                                </div>
                             </div>

            <?php

                         }
                    }

                    if($ordRow['product_type']=="daily"){
                        $id=$ordRow['product_id'];
                         $dailySql="select * from dailyproducts where id='$id'";
                         $daily=mysqli_query($con,$dailySql);
                         while ($dailyRow=mysqli_fetch_assoc($daily) ){
                            ?>

                             <div class="product">
                                <div class="cartimg">
                                    <img src="<?php echo SITE_MENU_IMAGE.$dailyRow['proPhoto'];  ?>" alt="" class="img-fluid rounded">
                                </div>
                                <div class="cartProDesc">
                                        <b class="product-name"><?php  echo $dailyRow['proName']; ?></b><br>
                                        <span class="product-price">&#8377;<?php  echo $dailyRow['proPrice']; ?> x <?php echo $ordRow['product_qty'];  ?> = <?php echo $ordRow['price'];  ?></span>
                                </div>
                             </div>

    


            <?php

                         }
                    }

                    if($ordRow['product_type']=="menu"){
                        $id=$ordRow['product_id'];
                         $menuSql="select * from menu where id='$id'";
                         $menu=mysqli_query($con,$menuSql);
                         while ($menuRow=mysqli_fetch_assoc($menu) ){
                            ?>
                            <div class="product">
                                    <div class="cartimg">
                                        <img src="<?php echo SITE_MENU_IMAGE.$menuRow['menuPhoto'];  ?>" alt="" class="img-fluid rounded">
                                    </div>
                                    <div class="cartProDesc">
                                        <b class="product-name"><?php  echo $menuRow['menuName']; ?></b><br>
                                        <span class="product-price">&#8377;<?php  echo $menuRow['menuPrice']; ?> x <?php echo $ordRow['product_qty'];  ?> = <?php echo $ordRow['price'];  ?></span>
                                    </div>
                             </div>
            <?php
                         }
                    }
                }

				?>
				<div class="border-top mt-4 fs-5">
                  <b class="">ORDER TOTAL</b>
                    <b class='ms-3'>    &#8377; <?php echo $OrderRow['total']; ?></b>
                </div>
			</div>
			<!-- modal close -->
		
		</div>
		<!-- card ends -->
		<?php
			}
			// OrderRow ends
		} //main if ends
		else{
		?>
		<div class="mx-auto w-25 text-center" >
   			<img src="<?php echo SITE_PATH; ?>asset/images/nofav.png" class="img-fluid"><br>
   			<h3 class="text-center fw-bolder">No Orders Yet!</h3>
		</div>
	  <?php		
		}
		?>

	</div>
	<!-- container ends -->
    
</div>
<!-- ........... -->
</div>
<div>
<!-- End demo content -->
    <script type="text/javascript">
        $(".nav .nav-item ").removeClass("activeNavItem");
        $(".nav .orderNav").addClass("activeNavItem");
    </script>
<!-- footer -->
    <?php

        include 'footer.php';

    ?>
 