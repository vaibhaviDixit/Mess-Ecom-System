<?php

include ('top.php');
$sql="select * from bulkorders order by id desc";
$res=mysqli_query($con,$sql);

?>

            <main class="content">
                <div class="container-fluid p-4">

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Bulk/Corporate Orders</h1>
                    </div>
                    <hr>

                <div class="container table-responsive">

                    <table class="table table-striped  table-hover table-sm pt-3" id="dttable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Requirements</th>
                            <th scope="col">Time</th>

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
                        <td scope="col"> <?php  echo $row['name']; ?></td>
                        <td scope="col"> <?php  echo $row['phone']; ?></td>
                        <td scope="col"> <?php  echo $row['requirements']; ?></td>
                        <td scope="col"> <?php  echo mydate($row['addedon']); ?></td>


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