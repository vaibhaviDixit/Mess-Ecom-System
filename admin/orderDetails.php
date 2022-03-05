<?php

include ('top.php');


if(isset($_GET['orderID'])){
    $orderId=getSafeVal($_GET['orderID']);

    if(!strstr($orderId,'MESSORDER')){

        $sql="select offlineorders.*,offorderdetails.orderId,orderstatus.name as orderStatus from offlineorders,offorderdetails,orderstatus where offlineorders.order_status=orderstatus.id and offorderdetails.orderId='$orderId' and offlineorders.orderId='$orderId' ";

        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        $orderDetails=mysqli_query($con,"select * from offorderdetails where orderId='$orderId' ");

        if(isset($_POST['newOrdStatus']) && intval($_POST['newOrdStatus'])>0){
           $ordId=$_POST['newOrdStatus'];
           $oid=$_POST['oid'];
           
           $changeStSql=mysqli_query($con,"update offlineorders set order_status=$ordId where orderId='$orderId'");
           
           if($changeStSql){
                unset($_POST['newOrdStatus']);
                echo '<script type="text/javascript">swal("Order Status Updated","","success").then(function(){window.location.href=window.location.href;});</script>';

           }
        }

    }else{


        $uid=explode("_", $orderId)[1];

        $sql="select orders.*,orderdetails.*,user.name,orderstatus.name as orderStatus from orders,orderdetails,user,orderstatus where orderdetails.uid='$uid' and orders.order_status=orderstatus.id and orders.orderId='$orderId' and orderdetails.orderId='$orderId' ";

        $orderDetails=mysqli_query($con,"select * from orderdetails where orderId='$orderId' and uid='$uid' ");
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);


        if(isset($_POST['newOrdStatus']) && intval($_POST['newOrdStatus'])>0){
           $ordId=$_POST['newOrdStatus'];
           $changeStSql=mysqli_query($con,"update orders set order_status='$ordId' where orderId='$orderId' ");
           
           if($changeStSql){
                unset($_POST['newOrdStatus']);
                echo '<script type="text/javascript">swal("Order Status Updated","","success").then(function(){window.location.href=window.location.href;});</script>';

           }
        }

    }

}
else{
    echo '<script type="text/javascript">alert("Something Went Wrong");</script>';
    redirect(SITE_PATH.'admin/listOnlineOrders');
}

?>

            <main class="content">
                <div class="container-fluid p-4">

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Orders Details</h1>
                    </div>
                    <hr>
                    <div class="container fw-bold fs-6">
                        <div class="d-flex justify-content-between">
                            <dt>Name : <?php echo $row['name']; ?></dt>
                            <dt>Phone : <?php echo $row['phone']; ?></dt>
                        </div>
                        <div  class="d-flex justify-content-between">
                            <dt>Address : <?php echo $row['address']; ?></dt>
                            <dt>Payment Type : <?php echo $row['payment_type']; ?></dt>
                        </div>
                        <div class="orderMark d-flex justify-content-between">
                            <dt>Order Status : <button class="badge rounded-pill btn btn-sm <?php  echo $row['orderStatus']; ?> "><?php  echo $row['orderStatus']; ?></button></dt>

                            <dt>Date : <?php  echo myDate($row['addedOn']); ?></dt>
                        </div>
                        <div  class="d-flex pt-1 align-items-center">
                            <label class="text-primary">Change Order Status : </label>
                            <form method="post" name="newOrdStatusForm" class="mx-2">
                               <input type="hidden" name="oid" value="<?php echo $row['id']; ?>">
                                            <select class="form-select form-select-sm" id="newOrdStatus" name="newOrdStatus" required onchange="this.form.submit();">
                                              
                                                <option selected disabled>Select Status</option>
                                                <?php
                                                    $orq=mysqli_query($con,'select * from orderstatus');
                                                    while($orderStRow=mysqli_fetch_assoc($orq)){ 
                                                ?>
                                                    <option value="<?php echo $orderStRow['id']; ?>"><?php echo $orderStRow['name']; ?></option>
                                                <?php
                                                        
                                                    }
                                                ?>
                                                
                                            </select>
                            </form>
                        </div>

                        <div class="border-top p-3  orderSumry orderSumryModal  d-flex justify-content-evenly flex-wrap">
                <?php
                   while($ordRow=mysqli_fetch_assoc($orderDetails)){
                    if(!isset($ordRow['product_type'])){
                         ?>
                            <div class="product">
                                <div class="cartProDesc">
                                  <b class="product-name"><?php echo $ordRow['name'];  ?></b><br>
                                        <span class="product-price">&#8377;<?php echo $ordRow['rate'];?> x <?php echo $ordRow['qty'];  ?> = <?php echo $ordRow['total'];  ?></span>
                                </div>
                             </div>

                         <?php
                    }
                    else{


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
                }

                ?>
            </div>
            <!-- modal close -->
                <div class="border-top mt-4 fs-5">
                  <b class="">ORDER TOTAL</b>
                    <b class='ms-3'>    &#8377; <?php echo $row['total']; ?></b>
                </div>

                    </div>
                </div>
            </main>

        

            <?php

                include 'footer.php';

            ?>
    