<?php
 include 'top.php';
 $totalMenus=totalMenus();
 $totalOrders=totalOrders();
 $totalRevenue=totalRevenue();
 $totalUsers=totalUsers();
 $pendingOrders=pendingOrders();
 $activeMembers=activeMembers();

?>
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-food"></i>
                  </h1>
                   <div class="dataCount"><?php echo $totalMenus;?></div>
                  <h6 class="text-white tags">Menu Items</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-tag "></i>
                  </h1>
                  <div class="dataCount"><?php echo $totalOrders;?></div>
                  <h6 class="text-white tags">Total Orders</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box  bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-table "></i>
                  </h1>
                   <div class="dataCount"><?php echo $pendingOrders;?></div>
                  <h6 class="text-white tags">Pending Orders</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-cash"></i>
                  </h1>
                  <div class="dataCount"><?php echo $totalRevenue;?></div>
                  <h6 class="text-white tags">Total Revenue</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                   <i class="mdi mdi-account"></i>
                  </h1>
                  <div class="dataCount"><?php echo $totalUsers;?></div>
                  <h6 class="text-white tags">Total Users</h6>
                </div>
              </div>
            </div>
            
           <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-secondary text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-multiple"></i>
                  </h1>
                  <div class="dataCount"><?php echo $activeMembers;?></div>
                  <h6 class="text-white tags">Active Members</h6>
                </div>
              </div>
            </div>
            
            <!-- Column -->
          </div>
          <!-- ============================================================== -->

          <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Revenue Analysis</h4>
                      <h5 class="card-subtitle">Overview of Latest Month</h5>
                    </div>
                  </div>
          
      
                  <div class="row">
                    <!-- column -->
                    <div class="col-lg-10 mx-auto" id="charts">
                      <div class="flot-chart" id="flot-chart" style="height: auto;">
                        <div class="loader"><img src="<?php echo SITE_PATH; ?>asset/img/loader.gif"></div>
                        <canvas id="myChart"></canvas>
                      </div>
                    </div>
                    <!-- column -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript">

          $('.dataCount').counterUp({
            delay: 10,
            time: 1000
          });

          let myRevenueData=new Array();

          var req = new XMLHttpRequest(); 

        //ssign data after fetching from server...
         req.onload = function() {
              arrayOfData=JSON.parse(this.responseText);

              for(var i in arrayOfData) {
                myRevenueData.push(arrayOfData[i]);
              }


          const myChart = new Chart(
              document.getElementById('myChart'),
               { type:'line',
                data:{
                  labels: ['Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec' ],
                  datasets: [{
                    label: '',
                    pointRadius:4,
                    backgroundColor: '#35858B',
                    borderColor: '#1C658C',
                    data:myRevenueData,
                  }]
                },
                  options:{

                  }
                }
                
            );


           };

          req.onreadystatechange = function() {
            console.log(this.readyState)
            if (this.readyState ==4) {
              $(".loader").hide();
            }
            else{
              $(".loader").show();
            }
          };

          req.open("get", "getRevenueData.php", true); 
          req.send();

        </script>

    <?php 
    include 'footer.php';
    ?>








