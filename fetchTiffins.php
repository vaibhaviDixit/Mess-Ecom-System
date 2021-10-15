<?php

include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

$id=$_POST['id'];

$tiffinsSql="select * from subscriptions where id='$id' ";

$tiffins=mysqli_query($con,$tiffinsSql);

$output="";


                if(mysqli_num_rows($tiffins)>0){
                    
 							
                        while($plans=mysqli_fetch_assoc($tiffins)){
  
                        $output.='
                <div class="col-sm-4"> 
                    <div class="card">
                      <div class="card-header fs-2 fw-bold">
                        15 Days Plan
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fs-3 fw-bold">&#8377;'.$plans['15Days'].'</h5>
                        <p class="card-text fs-4">'.$plans['description'].'</p>
                        <a href="#" class="custombtn">Subscribe</a>
                      </div>
                    </div>
                </div>

                <div class="col-sm-4"> 
                    <div class="card">
                      <div class="card-header fs-2 fw-bold">
                        Weekly Plan
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fs-3 fw-bold">&#8377;'.$plans['weekly'].'</h5>
                        <p class="card-text fs-4">'.$plans['description'].'</p>
                        <a href="#" class="custombtn">Subscribe</a>
                      </div>
                    </div>
                </div>

                <div class="col-sm-4"> 
                    <div class="card">
                      <div class="card-header fs-2 fw-bold">
                       Monthy Plan
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fs-3 fw-bold">&#8377;'.$plans['monthly'].'</h5>
                        <p class="card-text fs-4">'.$plans['description'].'</p>
                        <a href="#" class="custombtn">Subscribe</a>
                      </div>
                    </div>
                </div>
                <?php 
                  }
                 ?>';
                 
                   } 
               }



              
   echo $output;



?>