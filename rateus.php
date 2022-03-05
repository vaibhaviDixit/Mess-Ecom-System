<!-- nav -->
<?php

        include 'userNav.php';
?>
<!-- Page content holder -->
<div class="page-content" id="content">

<div class="ratingWrappper mt-3">
    <p style="text-align: justify;"><b>Dear Customer,</b></br>
    Thank you for accepting our services.We would like to know how we performed.Please some time to give us your valuable feedback as it will help us in improving our service.Please rate your service experience.</p>
    <h5 class="fw-bold">Rate Us </h5><br>
    <div class="wrapper">
      <input type="radio" name="rate" id="star-1">
      <input type="radio" name="rate" id="star-2">
      <input type="radio" name="rate" id="star-3">
      <input type="radio" name="rate" id="star-4">
      <input type="radio" name="rate" id="star-5">
      <div class="content">
        <div class="outer">
          <div class="emojis">
            <li class="slideImg"><img src="<?php echo SITE_PATH; ?>asset/img/emoji-1.png" alt=""></li>
            <li><img src="<?php echo SITE_PATH; ?>asset/img/emoji-2.png" alt=""></li>
            <li><img src="<?php echo SITE_PATH; ?>asset/img/emoji-3.png" alt=""></li>
            <li><img src="<?php echo SITE_PATH; ?>asset/img/emoji-4.png" alt=""></li>
            <li><img src="<?php echo SITE_PATH; ?>asset/img/emoji-5.png" alt=""></li>
          </div>
        </div>
        <div class="stars mb-3">
          <label for="star-1" class="star-1 fas fa-star"></label>
          <label for="star-2" class="star-2 fas fa-star"></label>
          <label for="star-3" class="star-3 fas fa-star"></label>
          <label for="star-4" class="star-4 fas fa-star"></label>
          <label for="star-5" class="star-5 fas fa-star"></label>
        </div>
        <form method="post" id="reviewForm" class="container text-center">
					 
        <textarea name="review" id="suggestion" class="form-control fw-bold mx-auto" rows="3" placeholder="Describe your experience..." style="width: 75%;" required></textarea>
        <button class="btn btn-secondary mt-3" type="submit" name="submitReview" id="submitReview">Submit Review</button>

		</form>
        
      
      </div>
      <div class="footer">
        <span class="text"></span>
        <span class="numb"></span>
      </div>
    </div>
  </div>
    
</div>
</div>
<div>
<!-- End demo content -->
<script type="text/javascript">
		$(".nav .nav-item ").removeClass("activeNavItem");
		$(".nav .rateusNav").addClass("activeNavItem");


							$("#submitReview").on("click",function(e){
								e.preventDefault();
							    var stars=0;
								r1=$("#star-1").is(":checked");
								r2=$("#star-2").is(":checked");
								r3=$("#star-3").is(":checked");
								r4=$("#star-4").is(":checked");
								r5=$("#star-5").is(":checked");

								msg=$("#suggestion").val();

								if(r1){stars=1;}
								if(r2){stars=2;}
								if(r3){stars=3;}
								if(r4){stars=4;}
								if(r5){stars=5;}
							

								     jQuery.ajax({
										    url:'submitRate',
										    type:'post',
										    data:{stars : stars,msg:msg},
										    success:function(result){
										        
										      msg=jQuery.parseJSON(result);
										      if(msg.status=="success"){
										        swal("Thank you!", "Your reviews matters for us!", "success").then(function(){window.location.href=window.location.href;});
										      }
										      $("#reviewForm")[0].reset();

										      
										  }

							});

						})
					

						


</script>
<!-- footer -->
    <?php

        include 'footer.php';

    ?>
 