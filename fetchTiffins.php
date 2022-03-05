<?php
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/constants.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/messEcom/include/function.inc.php');
$id=$_POST['id'];

$tiffinsSql="select * from subscriptions where id='$id' ";

$tiffins=mysqli_query($con,$tiffinsSql);

$output="";


                if(mysqli_num_rows($tiffins)>0){
                    
 							
                        while($plans=mysqli_fetch_assoc($tiffins)){
  
                        $output.='
                <div class="row">
                  <div class="col-sm-7 menuDesc">
                    <div id="dispMenu">
                        <h3 class="sub-heading">-Meal Plan-</h3>
                        <div class="fs-4" style="padding: 1rem 2rem; text-align: left;">'.$plans['description'].'</div>
                    </div>
                    
                  </div>
                  <div class="col-sm-5">
                    <div> 
                        <div class="card">
                          <div class="card-header fs-2 fw-bold">
                            15 Days Plan <small class="fs-6">(Student)</small>
                          </div>
                          <div class="card-body d-flex flex-wrap">
                            <h5 class="card-title fs-3 fw-bold">&#8377;<span class="subPrice">'.$plans['15Days'].'</span> </h5>
                            <div class="mr1">
                              <form method="post">
                                <input type="text" name="subId" value="'.$plans['id'].'" hidden>
                                <input type="text" name="subDuration" value="15Days" hidden>
                                 <input type="submit" value="Subscribe" name="subscribeTiffin" class="subscribebtn"></input>
                              </form>
                            </div>         
                          </div>
                        </div>
                    </div>

                    <div> 
                        <div class="card">
                          <div class="card-header fs-2 fw-bold">
                            Weekly Plan <small class="fs-6">(Student)</small>
                          </div>
                          <div class="card-body d-flex flex-wrap">
                            <h5 class="card-title fs-3 fw-bold">&#8377;<span class="subPrice">'.$plans['weekly'].'</span></h5>
                            <div class="mr1">
                              <form method="post">
                                <input type="text" name="subId" value="'.$plans['id'].'" hidden>
                                <input type="text" name="subDuration" value="weekly" hidden>
                                 <input type="submit" value="Subscribe" name="subscribeTiffin" class="subscribebtn"></input>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div> 
                        <div class="card">
                          <div class="card-header fs-2 fw-bold">
                           Monthy Plan <small class="fs-6">(Student)</small>
                          </div>
                          <div class="card-body d-flex flex-wrap">
                            <h5 class="card-title fs-3 fw-bold">&#8377;<span class="subPrice">'.$plans['monthly'].'</span> </h5>
                            <div class="mr1">
                              <form method="post">
                                <input type="text" name="subId" value="'.$plans['id'].'" hidden>
                                <input type="text" name="subDuration" value="monthly" hidden>
                                 <input type="submit" value="Subscribe" name="subscribeTiffin" class="subscribebtn"></input>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                  </div>
                </div>';
                 
                   } 
               }



              
   echo $output;



?>