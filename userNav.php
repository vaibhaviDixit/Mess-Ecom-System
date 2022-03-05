<!-- nav -->
    <?php

        include 'nav.php';

        //if user not logged in and try to access user panel then redirect it to login

        $userDetails=array();

        if(!isset($_SESSION['CURRENT_USER'])){
          redirect(SITE_PATH);
        }
        else{
          $userDetails=getUserDetails();
          
        }




?>

<div class="userDash">

<h3 class="mx-5 fw-bold">My Account</h3>
       <!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 userNavToggle d-none"><i class="fa fa-bars mr-2"></i></button>

<!-- Vertical navbar -->
<div class="d-flex mx-5">
<div class="vertical-nav" id="sidebar">

  <ul class="nav flex-column mb-0">

    <li class="nav-item profileNav activeNavItem">
      <a href="profile" class="nav-link text-dark ">
                <i class="fas fa-user mr-3"></i>
                Profile
            </a>
    </li>
    <li class="nav-item orderNav">
      <a href="orders" class="nav-link text-dark">
                <i class="fas fa-weight-hanging mr-3 "></i>
                Orders
            </a>
    </li>
    
    <li class="nav-item subscriptionsNav">
      <a href="subscriptions" class="nav-link text-dark">
                <i class="fas fa-bookmark mr-3  fa-fw"></i>
                Subscriptions
            </a>
    </li>
    <li class="nav-item addressNav">
      <a href="address" class="nav-link text-dark">
                <i class="fas fa-address-card mr-3  fa-fw"></i>
                Addresses</a>
    </li>
    <li class="nav-item rateusNav">
      <a href="rateus" class="nav-link text-dark">
                <i class="fas fa-grin-stars mr-3  fa-fw"></i>
                Rate Us
            </a>
    </li>
  </ul>

</div>

<!-- End vertical navbar -->

