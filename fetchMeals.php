<?php

include ('include/database.inc.php');
include ('include/function.inc.php');
include ('include/constants.inc.php');

$catId=$_POST['id'];

$mealsSql="select meals.*, subscriptions.subscriptionName from meals,subscriptions where meals.mealSubscription=subscriptions.id and meals.mealType='$catId' ";

$meals=mysqli_query($con,$mealsSql);

$output="";


                if(mysqli_num_rows($meals)>0){

                	$output.="<div class='box-container'>";
                    
                    while ($meals_row=mysqli_fetch_assoc($meals) ) {
 							

  
                        $output.='<div class="box">
                            <div class="image">
                                <img src="'.SITE_MENU_IMAGE.$meals_row['mealPhoto'].'" alt="">
                                <a  href="javascript:void(0)" class="fas fa-eye desc"></a>
                                <a href="javascript:void(0)" class="fas fa-heart" onclick="addToFav('.$meals_row['id'].',`meal`,`add`)"></a>
                            </div>
                            <div class="content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <h3>'.$meals_row['subscriptionName'].'</h3>
                                <h3>'.$meals_row['mealName'].'</h3>
                                <span class="price">&#8377; '.$meals_row['mealPrice'].'</span>
                                <div class="quantity">
                                       <span class="dec">-</span>
                                       <span class="qty-input" id="mealQty'.$meals_row['id'].'">1</span>
                                       <span class="inc">+</span>
                                </div>
                                <a href="javascript:void(0)" class="custombtn addCart"  onclick="addCartMeals('.$meals_row['id'].',`meal`,`add`)" ><i class="fas fa-shopping-cart"></i>  Add to Cart</a>

                            </div>

                                <div class="eyeClick">
                                    <a  class="fas fa-times remove"></a>
                                    <p>'.$meals_row['mealDesc'].'</p>

                                </div>
                                 
                     </div>';
                      } 


                    $output.='</div>';
                 

                   } 



              
   echo $output;



?>