<script type="text/javascript">
                var catid=7;
                function fun(a){
                  catid=a;
                  alert(catid);
                }

             </script>

<a href="#" onclick="fun(9)">9</a>
<a href="#" onclick="fun(5)">5</a>






<?php 


	$mm="<script>document.write(catid);</script>";
   echo $mm;




 ?>
