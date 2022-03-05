<?php

include ('top.php');
$sql="select offlineorders.*,orderstatus.name as orderStatus from offlineorders,orderstatus where offlineorders.order_status=orderstatus.id ";
$res=mysqli_query($con,$sql);

?>

            <main class="content">
                <div class="container-fluid p-4">

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Offline Orders</h1>
                    </div>
                    <hr>

                <div class="container table-responsive">

                    <table class="table table-striped  table-hover table-sm pt-3" id="dttable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Status</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
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
                        <td scope="col" class="orderMark"><button class="badge rounded-pill btn btn-sm <?php  echo $row['orderStatus']; ?> "><?php  echo $row['orderStatus']; ?></button></td>
                        <td scope="col"> <?php  echo $row['name']; ?></td>
                        <td scope="col"> <?php  echo $row['phone']; ?></td>
                        <td scope="col"> <?php  echo $row['address']; ?></td>
                        <td scope="col"> <?php  echo $row['total']; ?></td>
                        <td scope="col"> <?php  echo myDate($row['addedOn']); ?></td>
                        <td scope="col">
                            <form action="<?php echo SITE_PATH.'admin/orderDetails'; ?>" method="get">
                                <input type="hidden" name="orderID" value="<?php  echo $row['orderId']; ?>">
                                <button class="btn btn-success btn-sm rounded-pill" type="submit">See Details</button>

                            </form>

                             <a target="_blank" href="<?php echo SITE_PATH.'admin/offOrderReceipt/'.$row['orderId']; ?>"><button class='btn btn-sm rounded-pill btn-success'><i class='fas fa-download'></i>       Receipt</button></a>

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