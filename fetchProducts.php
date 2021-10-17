<?php

include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

$catId=$_POST['id'];

$proSql="select * from dailyproducts where proCate='$catId' ";

$products=mysqli_query($con,$proSql);

$output="";


                if(mysqli_num_rows($products)>0){

                	$output.="<div class='box-container'>";
                    
                    while ($products_row=mysqli_fetch_assoc($products) ) {
 							

  
                        $output.=' <div class="box">
                          <img src="'.SITE_MENU_IMAGE.$products_row['proPhoto'].'" alt="">
                          <h3>'.$products_row['proName'].'</h3>
                          <p class="fs-4">'.$products_row['proDesc'].'</p>
                          <span>&#8377;'.$products_row['proPrice'].'</span>
                          <div class="quantity">
                                       <span class="dec">-</span>
                                       <span class="qty-input" id="dailyQty'.$products_row['id'].'">1</span>
                                       <span class="inc">+</span>
                          </div>
                                <a href="javascript:void(0)" class="custombtn addCart" onclick="addCartMeals('.$products_row['id'].',`daily`,`add`)"><i class="fas fa-shopping-cart"></i>  Add to Cart</a>

                      
            
                       </div>';
                      } 


                    $output.='</div>';
                 

                   } 



              
   echo $output;



?>