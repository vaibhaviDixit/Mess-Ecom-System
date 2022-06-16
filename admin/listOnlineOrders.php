<?php

include ('top.php');
$sql="select orders.*,user.name,orderstatus.name as orderStatus from orders,user,orderstatus where orders.userId=user.id and orders.payment_status='success' and orders.order_status=orderstatus.id order by orders.id desc";
$res=mysqli_query($con,$sql);

?>

            <main class="content">
                <div class="container-fluid p-4">

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Online Orders</h1>
                    </div>
                    <hr>

                <div class="container table-responsive">

                    <table class="table table-striped  table-hover table-sm pt-3" id="dttable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Status</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">PIN</th>
                            <th scope="col">Total</th>
                            <th scope="col">Time</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
<?php  

                            if(mysqli_num_rows($res) > 0){
                                $i=1;
                                while( $row=mysqli_fetch_assoc($res) ){

                        ?>

                        
                        <tr>
                        <td scope="col"> <?php  echo $i; ?></td>
                        <td scope="col"><?php  echo $row['id']; ?></td>
                        <td scope="col" class="orderMark"><button class="badge rounded-pill btn btn-sm <?php  echo $row['orderStatus']; ?> "><?php  echo $row['orderStatus']; ?></button></td>
                        <td scope="col"> <?php  echo $row['name']; ?></td>
                        <td scope="col"> <?php  echo $row['phone']; ?></td>
                        <td scope="col"> <?php  echo $row['address']; ?></td>
                        <td scope="col"> <?php  echo $row['pincode']; ?></td>
                        <td scope="col"> <?php  echo $row['total']; ?></td>
                        <td scope="col"> <?php  echo myDate($row['addedOn']); ?></td>
                        <td scope="col" class="text-center fs-6">
                            <form action="<?php echo SITE_PATH.'admin/orderDetails'?>" method="get">
                                <input type="hidden" name="orderID" value="<?php  echo $row['orderId']; ?>">
                                <button class="badge rounded-pill btn btn-sm btn-info" type="submit">Details</button></form>


                            <a target="_blank" href="<?php echo SITE_PATH.'orderReceipt/'.$row['orderId']; ?>"><button class='badge rounded-pill btn btn-sm btn-warning'><i class='fas fa-download'></i>  Receipt</button></a>

                        </td>


                        </tr>


                        <?php
                                $i++;

                                }
                            }
                            else{
                            ?>
                            <td colspan="4">Data not found</td>

                            <?php

                            }

                        ?>
                    </tbody>
                    </table>


                </div>



                    
                </div>
            </main>

        

            <?php

                include 'footer.php';

            ?>
    
    <?php



?>