<?php
 include 'top.php';
 $sql="select banner.*,meals.id as mid,meals.mealName from banner,meals where banner.name=meals.id";
$res=mysqli_query($con,$sql);
?>
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        
      <main class="content">
        <div class="container-fluid p-4">

          <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Banner Images</h1>
          </div>
          <hr>
          <a class="text-light" href="<?php echo SITE_PATH.'admin/'; ?>AddBanner">
          <button class="btn btn-success btn-sm text-light">Add</button></a><br><br>
        <div class="container table-responsive">

          <table class="table table-striped  table-hover  table-sm pt-3" id="dttable">
          <thead class="table-primary">
            <tr>
            <th scope="col">Sr. No</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
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
            <td scope="col"> <?php  echo $row['mealName']; ?></td>
            <td scope="col"><a target="_blank" href="<?php  echo SITE_MENU_IMAGE.$row['image']; ?>"> <img width="100" height="100" src="<?php  echo SITE_MENU_IMAGE.$row['image']; ?>"> </a></td>
            <td scope="col" width="30%"> <?php  echo $row['description']; ?></td>
            <td scope="col">

              <a href="<?php echo SITE_PATH.'admin/'; ?>AddBanner/<?php echo $row['id'];?>"> <button class="btn btn-success btn-sm">Edit</button> </a>
              
              <a href="?id=<?php echo $row['id']; ?>&type=delete "> <button class="btn btn-danger btn-sm">Delete</button> </a>


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
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    <?php 
    include 'footer.php';
    ?>

<?php


  if( isset($_GET['type']) && $_GET['type']!==' '  &&  isset($_GET['id']) && $_GET['id'] > 0  )
  {

    $type=$_GET['type'];
    $id=$_GET['id'];

    if( $type == 'delete')
    {
       mysqli_query($con,"delete from banner where id='$id' ");
       redirect(SITE_PATH.'admin/manageBanner');

    }

  }

?>