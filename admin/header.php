<?php
//print_r($_SESSION);
$sessid=$_SESSION['cubeadmin_sess']['userid'];
$adminObj=new Admin();
$adminDetails=$adminObj->getAdminDetailsById($sessid);
//print_r($adminDetails);
$adminName=$adminDetails['user_name'];

?>
	<!-- main-header -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="dashboard.php"><img src="../img/tss-logo.png" class="logo-1" alt="logo"></a>
							<a href="dashboard.php"><img src="../img/tss-logo.png" class="dark-logo-1" alt="logo"></a>
							<a href="dashboard.php"><img src="../img/tss-logo.png" class="logo-2" alt="logo"></a>
							<a href="dashboard.php"><img src="../img/tss-logo.png" class="dark-logo-2" alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						<!-- <div class="main-header-center ml-3 d-sm-none d-md-none d-lg-block">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</div> -->
					</div>
					<div class="main-header-right">
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>
							<!-- <div class="dropdown nav-item main-header-message ">
								<a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" pulse-danger"></span></a>
								<div class="dropdown-menu">
									<div class="menu-header-content bg-primary text-left">
										<div class="d-flex">
											<h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Messages</h6>
											<span class="badge badge-pill badge-warning ml-auto my-auto float-right">Mark All Read</span>
										</div>
										<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread messages</p>
									</div>
									<div class="main-message-list chat-scroll">
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="  drop-img  cover-image  " data-image-src="assets/img/faces/6.png">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												
												<p class="mb-0 desc">New Walmart Order has been Received......</p>
												<p class="time mb-0 text-left float-left ml-2 mt-2">Mar 15 3:55 PM</p>
											</div>
										</a>
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="assets/img/faces/6.png">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												
												<p class="mb-0 desc">John completed his delivery......</p>
												<p class="time mb-0 text-left float-left ml-2 mt-2">Mar 06 01:12 AM</p>
											</div>
										</a>
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="assets/img/faces/6.png">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												
												<p class="mb-0 desc">New Big Basket Order Available...</p>
												<p class="time mb-0 text-left float-left ml-2 mt-2">Feb 25 10:35 AM</p>
											</div>
										</a>
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="assets/img/faces/12.jpg">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												
												<p class="mb-0 desc">Here are some products ...</p>
												<p class="time mb-0 text-left float-left ml-2 mt-2">Feb 12 05:12 PM</p>
											</div>
										</a>
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="assets/img/faces/5.jpg">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
											
												<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
												<p class="time mb-0 text-left float-left ml-2 mt-2">Jan 29 03:16 PM</p>
											</div>
										</a>
									</div>
									<div class="text-center dropdown-footer">
										<a href="text-center.html">VIEW ALL</a>
									</div>
								</div>
							</div> -->
							
							
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href="#"><img alt="" src="assets/img/faces/6.png"></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<!--<div class="main-img-user"><img alt="" src="assets/img/faces/6.jpg" class=""></div>-->
											<div class="ml-3 my-auto">
												<span>Welcome, <?php echo ucwords($adminName); ?></span>
											</div>
										</div>
									</div>
									<!--<a class="dropdown-item" href="#"><i class="bx bx-user-circle"></i>Profile</a>
									<a class="dropdown-item" href="#"><i class="bx bx-cog"></i> Edit Profile</a>
									<a class="dropdown-item" href="#"><i class="bx bxs-inbox"></i>Inbox</a>
									<a class="dropdown-item" href="#"><i class="bx bx-envelope"></i>Messages</a>-->
									<a class="dropdown-item" href="changepassword.php?eid=<?php echo $_SESSION['cubeadmin_sess']['userid']; ?>"><i class="bx bx-slider-alt"></i> Change Password</a>
									<a class="dropdown-item" href="sign-out.php"><i class="bx bx-log-out"></i> Sign Out</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->