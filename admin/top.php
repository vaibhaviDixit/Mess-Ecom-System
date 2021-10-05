<?php

session_start();
include ('database.inc.php');
include ('function.inc.php');
include ('constants.inc.php');

//if user not logged in and try to access admin panel then redirect it to login
if(!isset($_SESSION['admin_login'])){
	redirect('pages-sign-in.php');
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Admin</title>
    <!-- cdn for data table -->
 	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>
	<div class="wrapper">
			<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">AdminKit</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.php">
              			<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
           				 </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-profile.php">
           			   <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
           			 </a>
					</li>

					<li class="sidebar-header">
						Members
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-addMembers.php">
              			<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Add Members</span>
           			    </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-listMembers.php">
             			 <i class="align-middle" data-feather="map"></i> <span class="align-middle">View Members</span>
           				 </a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-addPayment.php">
              			<i class="align-middle" data-feather="map"></i> <span class="align-middle">Add Payment</span>
           				</a>
					</li>

				

					<li class="sidebar-header">
						Categories
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-addCategory.php">
              			<i class="align-middle" data-feather="square"></i> <span class="align-middle">Add Category</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-listCategory.php">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Categories</span>
            </a>
					</li>

					<li class="sidebar-header">
						Menu
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-addMenu.php">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Add Menu</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-listMenu.php">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">List Menu</span>
            </a>
					</li>

					<li class="sidebar-header">
						Meal Plans
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-addMealPlans.php">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Add Meals</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-listMealPlans.php">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">List Meals</span>
            </a>
					</li>

					<li class="sidebar-header">
						Orders
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-addOrder.php">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Add Order</span>
            </a>
					</li>

					

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-listOrders.php">
             				 <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">List Orders</span>
            			</a>
					</li>

					

					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Online Orders</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.html">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Payment Dues</span>
            </a>
					</li>

					
				</ul>

				
			</div>
		</nav>
<!-- sidebar nav ends -->

<!-- admin navbar starts -->
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">  <?php  echo $_SESSION['admin_name']; ?> </span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- admin navbar ends -->
